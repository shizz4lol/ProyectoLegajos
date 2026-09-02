<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Familiar extends Model
{
    protected $table = 'familiars';
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'email',
        'telefono',
        'domicilio',
        'parentesco',
    ];
    public function alumnos():BelongsToMany{
        return $this->belongsToMany(
            Alumno::class,
            'alumnosXfamiliars',
            'id_familiar',
            'id_alumno'
        );
    }
}
