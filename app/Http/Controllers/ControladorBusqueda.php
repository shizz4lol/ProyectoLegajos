<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Division;

class ControladorBusqueda extends Controller
{
    public function busquedaescuela(Request $request){
        $buscar=trim($request->input('buscador'));
        $resultados = Alumno::where('nombre', 'like', "%$busqueda%")
        ->orWhere('apellido', 'like', "%$busqueda%")
        ->orWhere('dni', 'like', "%$busqueda%")
        ->get();

        return view('busqueda', compact('resultados'));
    }
    public function busquedacurso(){
        $buscar=trim($request->input('buscador'));
    }
    public function buscar(Request $request){
        if (!Auth::check()) {
            return redirect('/');
        }

        if ($request->filled('id_curso') && $request->filled('id_division')) {
            return $this->busquedacurso($request);
        }

        return $this->busquedaescuela($request);
    }
}
