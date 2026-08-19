<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Documento;
use App\Models\Familiar;
use Illuminate\Http\Request;

class ControladorLegajo extends Controller
{  
    public function def(){
        $legajos = Alumno::with([
            'familiares',
            'documentos'
        ])->get();
        return $legajos;
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
                    /* $alumnos = Alumno::whereHas('curso.divisions', function ($query) use ($codigo) {
                  $query->wherePivot('codigo', $codigo);
                  })->get(); */
                  return view('prueba');
                    break;
                default:
                return view ('login');
                    break;
            }
            
           /*  return redirect('inicio')->with ($alumnos);  */
        }
    }
    public function create(){

    }
    public function store(){

    }
    public function update(){

    }
    public function edit(){
        
    }    
    public function delete(){

    }
}
