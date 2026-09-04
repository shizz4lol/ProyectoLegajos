<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Barryvdh\DomPDF\Facade\Pdf;
class ControladorPDF extends Controller
{
    public function legajo($id){
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
