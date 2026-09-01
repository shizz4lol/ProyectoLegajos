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
        $alumno->load([
            'familiares',
            'documentos',
            'curso',
            'division'
        ]);

        return view('bdconn.alumno', compact('alumno'));
    }
    public function curso($id_curso, $id_division){
        $curso = Curso::findOrFail($id_curso);
        $division = Division::findOrFail($id_division);
        $alumnos = Alumno::with([
            'familiares',
            'documentos',
            'curso',
            'division'
        ])->where('id_curso', $id_curso)->where('id_division', $id_division)->get();

        return view('bdconn.curso', compact('alumnos', 'curso', 'division'));
    }
    public function prece(Request $request){
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
        else{
            return redirect('/');
        }
    }
    public function create(){
        return view('bdconn.crearalumno');
    }
    public function store(Request $request){

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
            return redirect('legajos.create')->with('aviso', 'La combinación de curso y división no existe.');
        }

        $datosAlumno['id_curso'] = $curso->id;
        $datosAlumno['id_division'] = $division->id;

        DB::transaction(function () use ($datosAlumno, $request) {

            $alumno = Alumno::create($datosAlumno);
            $datosMadre = $request->input('madre');
            $datosMadre['parentezco'] = 'Madre';
            $madre = Familiar::where('dni', $datosMadre['dni'])->first();
            if (!$madre) {
                $madre = Familiar::create($datosMadre);
            }

            $datosPadre = $request->input('padre');
            $datosPadre['parentezco'] = 'Padre';
            $padre = Familiar::where('dni', $datosPadre['dni'])->first();
            if (!$padre) {
                $padre = Familiar::create($datosPadre);
            }

            $alumno->familiares()->attach([
                $madre->id,
                $padre->id
            ]);
        });
        return redirect('inicio')->with('aviso', 'El legajo fue creado correctamente.');
    }
    
    public function edit($id){
        $alumno = Alumno::findOrFail($id);
        return view('bdconn.modificar-alumno', compact('alumno'));
    }    
    public function update(Request $request, $id){
        $alumno = Alumno::findOrFail($id);

        $datos = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'dni' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        foreach ($datos as $campo => $valor) {
            if ($valor !== null && $valor !== '') {
                $alumno->$campo = $valor;
            }
        }

        $alumno->save();

        return redirect()->route('alumnos', $alumno->id_alumno)
        ->with('aviso', 'Datos personales modificados correctamente.');
    }
    public function destroy($id_alumno){
        $alumno = Alumno::findOrFail($id_alumno);
        DB::transaction(function () use ($alumno) {
            foreach ($alumno->familiares as $familiar) {
                $alumno->familiares()->detach($familiar->id);
                if ($familiar->alumnos()->count() === 0) {
                    $familiar->delete();
                }
            }
            foreach ($alumno->documentos as $documento) {
                $ruta = public_path($documento->archivo_adj);

                if (file_exists($ruta)) {
                    unlink($ruta);
                }
            }
            $alumno->documentos()->delete();
            $alumno->delete();
        });

        return redirect('inicio')->with('aviso', 'El legajo fue eliminado correctamente.');
    }

    public function archive(){

    }
}
