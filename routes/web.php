<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAlumno;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorLegajo;

Route::get('/', function(){
    return view ('login');
})->name('login');
Route::post('/validar', [ControladorLogin::class, 'validar'])->name('login.validar'); 

Route::get('/inicio', [ControladorLegajo::class, 'index'])->name('inicio');
Route::resource('/legajos', ControladorLegajo::class);