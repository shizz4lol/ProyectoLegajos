<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAlumno;
use App\Http\Controllers\ControladorLogin;

Route::get('/', [ControladorLogin::class, 'login'])->name('login');

Route::resource('alumnos', ControladorAlumno::class);