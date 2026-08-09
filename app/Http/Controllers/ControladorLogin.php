<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControladorLogin extends Controller{

    public function iralogout(){
        return view('logout');
    }
    public function validar(Request $request){
        $user= User::where('tipo_rol', $request->tipo_rol)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            session(['usuario' => $user->tipo_rol]);
            return redirect('inicio');
        } else if ($request->tipo_rol=='Preceptor') {
           
        }
        else {
            return back()->with('error', 'Por favor ingrese un usuario y contraseña validos');
        }
    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        return redirect('login');
    }

}
