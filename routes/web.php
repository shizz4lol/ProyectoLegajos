<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAlumno;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorLegajo;
use App\Http\Controllers\ControladorFamiliar;
use App\Http\Controllers\ControladorDocumento;
use App\Http\Controllers\ControladorBusqueda;

Route::get('/', function(){
    return view ('auth.login');
})->name('login');
Route::get('/alumno', function(){
    return view ('bdconn.alumno');
})->name('alumno');
Route::get('/cursos', function(){
    return view ('vistacursos');
})->name('cursosfull');
Route::get('/editar', function(){
    return view ('bdconn.modificar');
})->name('modificar');
Route::post('/salir', [ControladorLogin::class, 'CerrarSesion'])->name('logout');

Route::post('/validando', [ControladorLogin::class, 'IniciarSesion'])->name('validar'); 

Route::get('/inicio', [ControladorLegajo::class, 'index'])->name('inicio');

Route::resource('legajos', ControladorLegajo::class);
Route::get('/curso/{id_curso}/{id_division}', [ControladorLegajo::class, 'curso'])->name('curso');
Route::post('/validarcurso', [ControladorLegajo::class, 'prece'])->name('legajos.prece');
Route::get('/inicio3', [ControladorLegajo::class, 'inicio3'])->name('inicio3');

Route::get('/alumnos/{alumno}', [ControladorLegajo::class, 'alumno'])
    ->name('alumnos');

Route::post('/buscar', [ControladorBusqueda::class, 'buscar'])->name('buscar');

//RUTAS FAMILIARES:
Route::get('/crearfamiliar', [ControladorFamiliar::class, 'create'])->name('crearfamiliar');
Route::post('/alumnos/{alumno}/familiares', [ControladorFamiliar::class, 'store'])
    ->name('alumnos.familiares.store');

Route::put('/alumnos/{alumno}/familiares/{familiar}', [ControladorFamiliar::class, 'update'])
    ->name('alumnos.familiares.update');

Route::delete('/alumnos/{alumno}/familiares/{familiar}', [ControladorFamiliar::class, 'destroy'])
    ->name('alumnos.familiares.destroy');
//RUTAS DOCUMENTOS:
Route::get('/creardocumento', [ControladorDocumento::class, 'create'])->name('creardocumento');
Route::post('/alumnos/{alumno}/documentos', [ControladorDocumento::class, 'store'])
    ->name('alumnos.documentos.store');

Route::put('/alumnos/{alumno}/documentos/{documento}', [ControladorDocumento::class, 'update'])
    ->name('alumnos.documentos.update');

Route::delete('/alumnos/{alumno}/documentos/{documento}', [ControladorDocumento::class, 'destroy'])
    ->name('alumnos.documentos.destroy');