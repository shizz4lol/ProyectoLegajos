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
   /*  public function def(){
        $legajos=array();
    } */
    public function index(){
        $alumnos=[];
        if (!Auth::check()) {
            $user=Auth::user();
            if(($user->tipo_rol=='Secretaria')||($user->tipo_rol=='Jefe')) {
                    $alumnos = Alumno::all();
            }
           /*  return redirect('inicio')->with ($alumnos);  */
        }
        return view('inicio');
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
