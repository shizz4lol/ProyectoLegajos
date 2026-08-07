<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControladorLogin extends Controller{
    public function login(){
        return view('Proyecto.login');
    }
    public function validar(Request $request){
        $user= User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            session_start();
            $_SESSION['usuario'] = $user->name;
            return redirect('inicio');
        } else {
            return back()->with('error', 'Por favor ingrese un usuario y contraseña validos');
        }
    }
    public function logout(){
        Auth::logout();
        session_start();
        $_SESSION = [];
        session_destroy();
        return redirect('login');
    }

}
