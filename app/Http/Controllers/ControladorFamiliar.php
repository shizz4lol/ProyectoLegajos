<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familiar;
class ControladorFamiliar extends Controller{
    public function create(){
        if (!Auth::check()) {
            return redirect('/');
        }
        return view('bdconn.crearfamiliar');
    }
    public function store(Request $request){
        if (!Auth::check()) {
            return redirect('/');
        }

    }
    public function update(){

    }
    
}
