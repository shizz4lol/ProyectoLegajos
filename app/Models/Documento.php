<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
        'nombre',
        'tipo',
        'archivo_adj',
        'año',
        'copia'
    ];
    public function alumno(){
        return $this->belongsTo(Alumno::class, 'id_alumno');
    }
}
