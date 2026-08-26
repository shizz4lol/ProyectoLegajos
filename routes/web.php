<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAlumno;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorLegajo;
use App\Http\Controllers\ControladorFamiliar;
use App\Http\Controllers\ControladorDocumento;

Route::get('/', function(){
    return view ('auth.login');
})->name('login');
Route::get('/alumno/{alumno}', function(){
    return view ('bdconn.alumno');
})->name('alumno');
Route::get('/curso', function(){
    return view ('curso');
})->name('curso');
Route::post('/salir', [ControladorLogin::class, 'CerrarSesion'])->name('logout');

Route::post('/validando', [ControladorLogin::class, 'IniciarSesion'])->name('validar'); 

Route::get('/inicio', [ControladorLegajo::class, 'index'])->name('inicio');

Route::resource('legajos', ControladorLegajo::class);

Route::post('/inicioprece', [ControladorLegajo::class, 'prece'])->name('legajos.prece');

//RUTAS FAMILIARES:
Route::post('/alumnos/{alumno}/familiares', [ControladorFamiliar::class, 'store'])
    ->name('alumnos.familiares.store');

Route::put('/alumnos/{alumno}/familiares/{familiar}', [ControladorFamiliar::class, 'update'])
    ->name('alumnos.familiares.update');

Route::delete('/alumnos/{alumno}/familiares/{familiar}', [ControladorFamiliar::class, 'destroy'])
    ->name('alumnos.familiares.destroy');
//RUTAS DOCUMENTOS:
Route::post('/alumnos/{alumno}/documentos', [ControladorDocumento::class, 'store'])
    ->name('alumnos.documentos.store');

Route::put('/alumnos/{alumno}/documentos/{documento}', [ControladorDocumento::class, 'update'])
    ->name('alumnos.documentos.update');

Route::delete('/alumnos/{alumno}/documentos/{documento}', [ControladorDocumento::class, 'destroy'])
    ->name('alumnos.documentos.destroy');