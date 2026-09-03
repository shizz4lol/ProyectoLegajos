<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorLegajo;
use App\Http\Controllers\ControladorFamiliar;
use App\Http\Controllers\ControladorDocumento;
use App\Http\Controllers\ControladorBusqueda;

Route::get('/', function(){
        return view ('auth.login');
    })->name('login');
Route::post('/validando', [ControladorLogin::class, 'IniciarSesion'])->name('validar');

Route::middleware('auth')->group(function () {
    Route::post('/buscar-live', [ControladorBusqueda::class, 'buscarlive'])->name('buscar.live');
    
    Route::post('/salir', [ControladorLogin::class, 'CerrarSesion'])->name('logout');
    Route::get('/inicio', [ControladorLegajo::class, 'index'])->name('inicio');
    
    
    Route::get('/curso/{id_curso}/{id_division}', [ControladorLegajo::class, 'curso'])->name('curso');

    Route::post('/buscar', [ControladorBusqueda::class, 'buscar'])->name('buscar');
    Route::get('/alumnos/{alumno}', [ControladorLegajo::class, 'alumno'])
    ->name('alumnos');
    Route::resource('legajos', ControladorLegajo::class)
    ->middlewareFor(['create', 'store', 'edit', 'update', 'destroy'], 'rol:secretaria,jefe');
});

Route::middleware(['auth','rol:preceptor'])->group(function(){
    Route::post('/validarcurso', [ControladorLegajo::class, 'prece'])->name('legajos.prece');
    Route::get('/inicio3', [ControladorLegajo::class, 'inicio3'])->name('inicio3');
});



Route::middleware(['auth', 'rol:secretaria,jefe'])->group(function () {
    Route::get('/cursos', [ControladorLegajo::class, 'todoscursos'])->name('cursosfull'); 
    Route::get('/archivados', function(){
            return view ('bdconn.archivados');
    })->name('archivados');
    //RUTAS DOCUMENTOS:
    Route::get('/alumnos/{alumno}/documentos/crear', [ControladorDocumento::class, 'create'])
    ->name('creardocumento');

Route::post('/alumnos/{alumno}/documentos', [ControladorDocumento::class, 'store'])
    ->name('alumnos.documentos.store');

Route::get('/alumnos/{alumno}/documentos/{documento}/editar', [ControladorDocumento::class, 'edit'])
    ->name('editardocumento');

Route::put('/alumnos/{alumno}/documentos/{documento}', [ControladorDocumento::class, 'update'])
    ->name('alumnos.documentos.update');
    //RUTAS FAMILIARES:

    Route::get('/alumnos/{alumno}/familiares/crear', [ControladorFamiliar::class, 'create'])->name('crearfamiliar');
    Route::post('/alumnos/{alumno}/familiares', [ControladorFamiliar::class, 'store'])
        ->name('alumnos.familiares.store');
    Route::get('/alumnos/{alumno}/familiares/{familiar}/editar', [ControladorFamiliar::class, 'edit'])
        ->name('editarfamiliar');
    
    Route::put('/alumnos/{alumno}/familiares/{familiar}', [ControladorFamiliar::class, 'update'])
        ->name('alumnos.familiares.update');
    //RUTAS MODIFICACION DE CURSO MANUAL
    Route::get('/alumnos/{alumno}/editar-curso', [ControladorLegajo::class, 'editcurso'])
        ->name('editarcurso');
    Route::put('/alumnos/{alumno}/editar-curso', [ControladorLegajo::class, 'updatecurso'])
    ->name('updatecurso');
   
});
Route::middleware(['auth','rol:secretaria'])->group(function(){
    Route::delete('/alumnos/{alumno}/familiares/{familiar}', [ControladorFamiliar::class, 'destroy'])
    ->name('alumnos.familiares.destroy');

    Route::delete('/alumnos/{alumno}/documentos/{documento}', [ControladorDocumento::class, 'destroy'])
        ->name('alumnos.documentos.destroy');
    Route::get('/egresados', function(){
            return view ('egresados');
        })->name('egresados');
});

