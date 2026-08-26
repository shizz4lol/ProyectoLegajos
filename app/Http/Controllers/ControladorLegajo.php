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
    public function prece(Request $request){
        if (!Auth::check()) {
        return redirect('/');
    }
    $ingresoPreceptor = $request->input('prece');
    
    }
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
                  return view('preceptor');
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

    DB::transaction(function () use ($datosAlumno, $request) {
        $alumno = Alumno::create($datosAlumno);
        $madre = Familiar::create($request->input('madre'));
        $padre = Familiar::create($request->input('padre'));
        $alumno->familiares()->attach([
            $madre->id,
            $padre->id
        ]);
    });
    return redirect('inicio')->with('aviso', 'El legajo fue creado correctamente.');
    }
    public function update(){

    }
    public function edit(){
        
    }    
    public function delete(){

    }
}
