<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControladorLogin extends Controller{

    public function IniciarSesion(Request $request){
        $rol='';
        $request->nombre=strtolower(trim($request->nombre));
        $user= User::where('nombre', $request->nombre)->first();
        if ($user){
            if (Hash::check($request->password, $user->password)){
                Auth::login($user);
                session([
                    'usuario' => $user->nombre,
                    'rol'=> $user->tipo_rol
                    ]);
                return redirect('inicio');
           } 
        else {
            return back()->with('error', 'Por favor, ingrese una contraseña valida');
        }
        }
        else {
            return back()->with('error', 'Por favor, ingrese un usuario valido');
        }
    }
    public function CerrarSesion(){
        Auth::logout();
        session()->invalidate();
        return redirect('/');
    }

}
