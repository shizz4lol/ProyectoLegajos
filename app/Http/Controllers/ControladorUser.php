<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControladorUser extends Controller
{
    public function create(){
        return view ('auth.register');
    }
    public function store(Request $request){
    $request->validate([
        'nombre' => 'required|string|max:255|unique:users,nombre',
        'password' => 'required|string|min:8|confirmed',
        'rol'=>'required|string',
    ], [
        'nombre.required' => 'El nombre de usuario es obligatorio.',
        'nombre.unique' => 'Ese nombre de usuario ya existe.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ]);

    User::create([
        'nombre' => $request->nombre,
        'tipo_rol'=>$request->rol,
        'password' => Hash::make($request->password),
    ]);

    return redirect()
        ->route('registrarusuario')->with('aviso', 'Usuario creado correctamente.');
}
}
