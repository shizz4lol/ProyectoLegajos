<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Documento;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ControladorLegajo extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect('index');
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
