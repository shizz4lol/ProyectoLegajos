<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiars';
    public function alumnos():BelongsToMany{
        return $this->belongsToMany(
            Alumno::class,
            'alumnoXfamiliars',
            'id_familiar',
            'id_alumno'
        );
    }
}
