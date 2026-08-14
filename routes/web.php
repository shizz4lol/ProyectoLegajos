<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAlumno;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorLegajo;

Route::get('/', function(){
    return view ('auth.login');
})->name('login');


Route::post('/validando', [ControladorLogin::class, 'IniciarSesion'])->name('validar'); 

Route::get('/inicio', [ControladorLegajo::class, 'index'])->name('iniciouno');

Route::resource('/legajos', ControladorLegajo::class);