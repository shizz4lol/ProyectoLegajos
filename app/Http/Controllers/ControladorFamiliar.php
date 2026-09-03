<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familiar;
use App\Models\Alumno;
class ControladorFamiliar extends Controller{
    public function create(Alumno $alumno){
        return view('bdconn.create.crearfamiliar',compact('alumno'));
    }
    public function store(Request $request, Alumno $alumno){
        $request->validate([
            'familiar.nombre' => 'required|string|max:255',
            'familiar.apellido' => 'required|string|max:255',
            'familiar.dni' => 'required|integer',
            'familiar.fecha_nacimiento' => 'required|date',
            'familiar.email' => 'nullable|email|max:255',
            'familiar.telefono' => 'nullable|string|max:255',
            'familiar.domicilio' => 'nullable|string|max:255',
            'familiar.parentesco' => 'required|string|max:255',
        ]);

        $datosfamiliar = $request->input('familiar');

        $familiar = Familiar::create($datosfamiliar);

        $alumno->familiares()->attach($familiar->id);

        return redirect()->route('alumnos', $alumno->id_alumno)->with('aviso', 'Familiar cargado correctamente.');
    }
    public function edit(Alumno $alumno, Familiar $familiar){
        return view('bdconn.edit.modificar-familiar', compact('alumno', 'familiar'));
    }
    public function update(Request $request, Alumno $alumno, Familiar $familiar){
        $request->validate([
            'familiar.nombre' => 'required|string|max:255',
            'familiar.apellido' => 'required|string|max:255',
            'familiar.dni' => 'required|integer',
            'familiar.fecha_nacimiento' => 'required|date',
            'familiar.email' => 'nullable|email|max:255',
            'familiar.telefono' => 'nullable|string|max:255',
            'familiar.domicilio' => 'nullable|string|max:255',
            'familiar.parentesco' => 'required|string|max:255',
        ]);

        $datosFamiliar = $request->input('familiar');

        $familiar->update($datosFamiliar);

        return redirect()
            ->route('alumnos', $alumno->id_alumno)->with('aviso', 'Familiar actualizado correctamente.');
        }
    public function destroy(Alumno $alumno, Familiar $familiar){
        $alumno->familiares()->detach($familiar->id);

        if ($familiar->alumnos()->count() === 0) {
            $familiar->delete();
        }
    
        return redirect()
            ->route('alumnos', $alumno->id_alumno)->with('aviso', 'Familiar eliminado correctamente.');

    }
    
}
