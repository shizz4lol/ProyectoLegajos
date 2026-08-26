<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Curso extends Model
{
    protected $table = 'cursos';
    public function divisiones():BelongsToMany{
        return $this->belongsToMany(
            Division::class,
            'cursosXdivisions',
            'id_curso',
            'id_division'
        )->withPivot('turno');
    }
    public function alumnos(): HasMany{
    return $this->hasMany(Alumno::class,'id_curso');
    }
}
