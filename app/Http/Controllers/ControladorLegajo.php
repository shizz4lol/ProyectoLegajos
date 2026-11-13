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
            'documentos',
        ])->whereNull('archivado_at')->get();
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
        ])->where('id_curso', $id_curso)->where('id_division', $id_division)->whereNull('año_egreso')->whereNull('archivado_at')
        ->get();
        return view('bdconn.curso', compact('alumnos', 'curso', 'division'));
    }
    public function todoscursos(){
        $cursos = Curso::with('divisiones')->get();

        return view('vistacursos', compact('cursos'));
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
            return redirect()->back()->with('error', 'La combinación de curso y división no existe.');
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
        ->whereNull('año_egreso')
        ->whereNull('archivado_at')
        ->get();

        return view('iniciotres',compact('alumnos', 'curso', 'division', 'cursoDivision'));
    }
    public function editcurso(Alumno $alumno){
        $curso = $alumno->curso;
        $division = $alumno->division;

        return view('bdconn.edit.modificar-curso', compact('alumno', 'curso', 'division'));
    }
    public function updatecurso(Request $request, Alumno $alumno)    {
        $request->validate([
            'curso' => 'required|exists:cursos,curso',
            'division' => 'required|exists:divisions,division',
        ]);

        $curso = Curso::where('curso', $request->curso)->firstOrFail();
        $division = Division::where('division', $request->division)->firstOrFail();

        $alumno->id_curso = $curso->id;
        $alumno->id_division = $division->id;

        $alumno->save();

        return redirect()->route('alumnos', $alumno)
        ->with('aviso', 'Curso actualizado correctamente.');
    }
    
    public function pasar(){
        DB::transaction(function () {
            $alumnos = Alumno::where('año_cursado', '<=', 6)
                ->whereNull('año_egreso')
                ->whereNull('archivado_at')
                ->get();

            foreach ($alumnos as $alumno) {
                $cursoActual = Curso::findOrFail($alumno->id_curso);

                switch ($cursoActual->curso) {
                    case '1°':
                        $siguiente_curso = '2°';
                        break;
                    case '2°':
                        $siguiente_curso = '3°';
                        break;
                    case '3°':
                        $siguiente_curso = '4°';
                        break;
                    case '4°':
                        $siguiente_curso = '5°';
                        break;
                    case '5°':
                        $siguiente_curso = '6°';
                        break;
                    case '6°':
                        $alumno->año_cursado = 6;
                        $alumno->año_egreso = date('Y');
                        $alumno->save();
                        continue 2;
                    default:
                        continue 2;
                }

                $cursoSiguiente = Curso::where('curso', $siguiente_curso)->firstOrFail();

                $alumno->id_curso = $cursoSiguiente->id;
                $alumno->año_cursado++;
                $alumno->save();
            }
        });

        return redirect()
            ->route('cursosfull')
            ->with('aviso', 'Los alumnos pasaron de año correctamente.');
    }

    public function egresados(){
        $egresados = Alumno::whereNotNull('año_egreso')->whereNull('archivado_at')->get();

        return view('egresados', compact('egresados'));
    }

    public function archivados(){
        $archivados = Alumno::whereNotNull('fecha_archivado')->get();

        return view('bdconn.archivados', compact('archivados'));
    }
    public function archivar($id_alumno)
    {
        if (session('rol') !== 'secretaria') {
            abort(403);
        }
    
        $alumno = Alumno::findOrFail($id_alumno);
    
        if ($alumno->archivado_at !== null) {
            return redirect()->back()
                ->with('aviso', 'El legajo ya se encuentra archivado.');
        }
    
        $alumno->archivado_at = now();
        $alumno->save();
    
        return redirect()
            ->route('inicio')
            ->with('aviso', 'El legajo fue archivado correctamente.');
    }
    public function desarchivar($id_alumno){
        abort_unless(session('rol') === 'secretaria', 403);

        $alumno = Alumno::findOrFail($id_alumno);

        if ($alumno->fecha_archivado === null) {
            return redirect()->back()
                ->with('aviso', 'El legajo no se encuentra archivado.');
        }

        $alumno->fecha_archivado = null;
        $alumno->save();

        return redirect()
            ->route('archivados')
            ->with('aviso', 'El legajo fue desarchivado correctamente.');
    }
    


/*  -------------------FUNCIONES CRUD/RESOURCE-------------------  */
    public function index(){
        $alumnos = $this->def();
        $cursos = Curso::with('divisiones')->get();
        $rol = session('rol');
        if (Auth::check()) {
            switch($rol){
                case 'secretaria':
                    return view('iniciouno', compact ('alumnos', 'cursos'));
                    break;
                case 'jefe':
                    return view('iniciodos', compact ('alumnos', 'cursos'));
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
        return view('bdconn.create.crearalumno');
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
            return redirect()->route('legajos.create')->with('aviso', 'La combinación de curso y división no existe.');
        }
        switch ($curso->curso) {
            case '1°':
                $año_cursado = 0;
                break;
            case '2°':
                $año_cursado = 1;
                break;
            case '3°':
                $año_cursado = 2;
                break;
            case '4°':
                $año_cursado = 3;
                break;
            case '5°':
                $año_cursado = 4;
                break;
            case '6°':
                $año_cursado = 5;
                break;
            default:
                return redirect()->route('legajos.create') ->with('aviso', 'El curso seleccionado no es válido.');
        }
        $datosAlumno['id_curso'] = $curso->id;
        $datosAlumno['id_division'] = $division->id;
        $alumno = DB::transaction(function () use ($datosAlumno, $request, $año_cursado) {

        $alumno = Alumno::create($datosAlumno);
        $alumno['año_cursado']=$año_cursado;
        $alumno->save();
        $datosMadre = $request->input('madre');
        $datosPadre = $request->input('padre');
        $tutor = $request->input('tutor');
        
        if (!empty($datosMadre) && !empty($datosMadre['dni'])) {
        
            $datosMadre['parentesco'] = 'Madre';
            $madre = Familiar::where('dni', $datosMadre['dni'])->first();
            if (!$madre) {
                $madre = Familiar::create($datosMadre);
            }      
            $alumno->familiares()->attach($madre->id);
        }
        
        if (!empty($datosPadre) && !empty($datosPadre['dni'])) {       
            $datosPadre['parentesco'] = 'Padre';       
            $padre = Familiar::where('dni', $datosPadre['dni'])->first();        
            if (!$padre) {
                $padre = Familiar::create($datosPadre);
            }        
            $alumno->familiares()->attach($padre->id);
        }
        
        if (!empty($tutor) && !empty($tutor['dni'])) { 
            $familiarTutor = Familiar::where('dni', $tutor['dni'])->first();        
            if (!$familiarTutor) {
                $familiarTutor = Familiar::create($tutor);
            }        
            $alumno->familiares()->attach($familiarTutor->id);
        }
        return $alumno;
        });
        return redirect()->route('alumnos', $alumno->id_alumno)->with('aviso', 'El legajo fue creado correctamente.');
    }
    public function edit($id){
        $alumno = Alumno::findOrFail($id);
        return view('bdconn.edit.modificar-alumno', compact('alumno'));
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
        return redirect()->route('alumnos', $alumno->id_alumno)->with('aviso', 'Datos personales modificados correctamente.');
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
}