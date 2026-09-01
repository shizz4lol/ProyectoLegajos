<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Alumno;
class ControladorDocumento extends Controller
{
    public function create(Alumno $alumno){
        return view('bdconn.creardocumento',compact('alumno'));
    }
    public function store(Request $request, Alumno $alumno){
        $request->validate([
            'documento.nombre' => 'required|string|max:255',
            'documento.tipo' => 'required|string|max:255',
            'documento.año' => 'required|integer|min:2000|max:2100',
            'documento.archivoadj' => 'required|file|max:10240',
        ]);

        $documento = $request->input('documento');

        $archivo = $request->file('documento.archivoadj');

        $original = $archivo->getClientOriginalName();

        $nombre = time() . '_' . $original;

        $archivo->move(public_path('documentosbd'), $nombre);

        Documento::create([
            'nombre' => $documento['nombre'],
            'tipo' => $documento['tipo'],
            'año' => $documento['año'],
            'copia' => isset($documento['copia']) ? 1 : 0,
            'archivo_adj' => 'documentosbd/' . $nombre,
            'id_alumno' => $alumno->id_alumno,
        ]);

        return redirect()->route('alumnos', $alumno->id_alumno)->with('aviso', 'Documento guardado correctamente.');
    }

    public function update(){

    }
    public function destroy($id_alumno, $id_documento){
        $documento = Documento::findOrFail($id_documento);

        $ruta = public_path($documento->archivo_adj);

        if (file_exists($ruta)) {
            unlink($ruta);
        }

        $documento->delete();

        return redirect()->route('alumnos', $id_alumno)->with('aviso','Documento eliminado correctamente.'
        );
    }
}
