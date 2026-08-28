<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Division;

class ControladorBusqueda extends Controller{
    public function busquedaescuela(Request $request){
        $buscar=trim($request->input('buscador'));
            $resultados = Alumno::where('nombre', 'like', "$buscar%")
            ->orWhere('apellido', 'like', "$buscar%")
            ->orWhere('dni', 'like', "$buscar%")
            ->get();
      

        return view('busqueda', compact('resultados'));
    }
    public function busquedacurso(Request $request){
        $buscar = trim($request->input('buscador'));

        $id_curso = $request->input('id_curso');
        $id_division = $request->input('id_division');

        $resultados = Alumno::where('id_curso', $id_curso)->where('id_division', $id_division)
                      ->where(function ($query) use ($buscar) {
                        $query->where('nombre', 'like', "$buscar%")
                            ->orWhere('apellido', 'like', "$buscar%")
                            ->orWhere('dni', 'like', "$buscar%");
                    })->get();

        return view('busqueda', compact('resultados'));
    }
    public function buscar(Request $request){
        if (!Auth::check()) {
            return redirect('/');
        }
        if (session('rol') == 'preceptor') {
            $request->merge([
                'id_curso' => session('prece_curso'),
                'id_division' => session('prece_division')
            ]);
    
            return $this->busquedacurso($request);
        }
        if ($request->filled('id_curso') && $request->filled('id_division')) {
            return $this->busquedacurso($request);
        }
        return $this->busquedaescuela($request);
    }
}
