<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Barryvdh\DomPDF\Facade\Pdf;
class ControladorPDF extends Controller
{
    public function legajo($id){
        /* dd([
        'php_version' => PHP_VERSION,
        'php_binary' => PHP_BINARY,
        'php_ini' => php_ini_loaded_file(),
        'gd' => extension_loaded('gd'),
        'extensions' => get_loaded_extensions(),
        'gd_functions' => [
    'imagecreatefromjpeg' => function_exists('imagecreatefromjpeg'),
    'imagecreatefrompng' => function_exists('imagecreatefrompng'),
    'imagecreatetruecolor' => function_exists('imagecreatetruecolor'),
],
    ]); */
        $alumno = Alumno::with([
            'documentos',
            'familiares',
            'curso',
            'division'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.legajo', compact('alumno'));

        return $pdf->stream('legajo.pdf');
    }
}
