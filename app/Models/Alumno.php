<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'acta_nacimiento',
        'inscripcion',
        'constanciaregular',
        'apto_herramientas'
    ];
    public function familiares(): BelongsToMany{
        return $this->belongsToMany(
            Familiar::class,
            'alumnosXfamiliars',
            'id_alumno',
            'id_familiar'
        );
    }
    public function documentaciones(){
    return $this->hasMany(Documentacion::class, 'id_alumno');
    }
    public function curso(): BelongsTo{
    return $this->belongsTo(Curso::class, 'id_curso');
    }
}
