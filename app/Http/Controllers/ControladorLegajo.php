<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Documento;
use App\Models\Familiar;
use App\Models\Curso;
use App\Models\Division;



class ControladorLegajo extends Controller
{  
    public function def(){
        $legajos = Alumno::with([
            'familiares',
            'documentos'
        ])->get();
        return $legajos;
    }
    public function alumno(Alumno $alumno){
        if (!Auth::check()) {
            return redirect('/');
        }
        $alumno->load([
            'familiares',
            'documentos',
            'curso',
            'division'
        ]);

        return view('bdconn.alumno', compact('alumno'));
    }
    public function curso($id_curso, $id_division){
        if (!Auth::check()) {
            return redirect('/');
        }

        $curso = Curso::findOrFail($id_curso);
        $division = Division::findOrFail($id_division);

        $alumnos = Alumno::with([
            'familiares',
            'documentos',
            'curso',
            'division'
        ])->where('id_curso', $id_curso)->where('id_division', $id_division)->get();

        return view('curso', compact('alumnos', 'curso', 'division'));
    }
    public function prece(Request $request){
        if (!Auth::check()) {
            return redirect('/');
        }
        $ingresoPreceptor = $request->input('prece');

        $curso = Curso::where('curso', $ingresoPreceptor['curso'])->first();
        $division = Division::where('division', $ingresoPreceptor['division'])->first();

        $cursoDivision = DB::table('cursosXdivisions')
            ->where('id_curso', $curso->id)
            ->where('id_division', $division->id)
            ->first();

        if (!$cursoDivision) {
            return redirect('/')
                ->with('error', 'La combinación de curso y división no existe.');
        }
        session([
            'prece_curso' => $curso->id,
            'prece_division' => $division->id
        ]);

        return redirect()->route('inicio3');
    }

    public function inicio3(){
        if (!Auth::check()) {
            return redirect('/');
        }

        $id_curso = session('prece_curso');
        $id_division = session('prece_division');

        $curso = Curso::find($id_curso);
        $division = Division::find($id_division);

        $cursoDivision = DB::table('cursosXdivisions')
            ->where('id_curso', $id_curso)
            ->where('id_division', $id_division)
            ->first();

        $alumnos = Alumno::with([
            'familiares',
            'documentos',
            'curso',
            'division'
        ])
        ->where('id_curso', $id_curso)
        ->where('id_division', $id_division)
        ->get();

        return view('iniciotres',compact('alumnos', 'curso', 'division', 'cursoDivision'));
    }
/*  -------------------FUNCIONES CRUD/RESOURCE-------------------  */
    public function index(){
        $alumnos = $this->def();
        $rol = session('rol');
        if (Auth::check()) {
            switch($rol){
                case 'secretaria':
                    return view('iniciouno', compact ('alumnos'));
                    break;
                case 'jefe':
                    return view('iniciodos', compact ('alumnos'));
                    break;
                case 'preceptor':
                  return view('auth.preceptor');
                    break;
                default:
                return view ('login');
                    break;
            }
            
           /*  return redirect('inicio')->with ($alumnos);  */
        }
    }
    public function create(){
        if (!Auth::check()) {
            return redirect('/');
        }
        return view('bdconn.crear');
    }
    public function store(Request $request){
    if (!Auth::check()) {
        return redirect('/');
    }

    $datosAlumno = $request->input('alumno');
    $curso = $datosAlumno['curso'];
    $division = $datosAlumno['division'];

    unset($datosAlumno['curso'], $datosAlumno['division']);

    $curso = Curso::where('curso', $curso)->firstOrFail();
    $division = Division::where('division', $division)->firstOrFail();

    $cursoDivision = DB::table('cursosXdivisions')
        ->where('id_curso', $curso->id)
        ->where('id_division', $division->id)
        ->first();

    if (!$cursoDivision) {
        return redirect('inicio')
            ->with('aviso', 'La combinación de curso y división no existe.');
    }

    $datosAlumno['id_curso'] = $curso->id;
    $datosAlumno['id_division'] = $division->id;

    DB::transaction(function () use ($datosAlumno, $request) {

        $alumno = Alumno::create($datosAlumno);

        $datosMadre = $request->input('madre');
        $datosMadre['parentezco'] = 'Madre';
        $madre = Familiar::create($datosMadre);
        $datosPadre = $request->input('padre');
        $datosPadre['parentezco'] = 'Padre';
        $padre = Familiar::create($datosPadre);

        $alumno->familiares()->attach([
            $madre->id,
            $padre->id
        ]);
    });
    return redirect('inicio')
        ->with('aviso', 'El legajo fue creado correctamente.');
}
    public function update(){

    }
    public function edit(){
        
    }    
    public function delete(){

    }
}
