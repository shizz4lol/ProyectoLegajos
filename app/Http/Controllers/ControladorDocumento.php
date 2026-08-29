<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Documento;
class ControladorDocumento extends Controller
{
    public function create(){
        if (!Auth::check()) {
            return redirect('/');
        }
        return view('bdconn.creardocumento');
    }
    public function store(Request $request){
        if (!Auth::check()) {
            return redirect('/');
        }

    }
    public function update(){

    }
}
