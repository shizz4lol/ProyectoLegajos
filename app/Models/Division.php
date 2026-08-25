<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 

class Division extends Model
{
    protected $table = 'divisions';
    public function cursos():BelongsToMany{
        return $this->belongsToMany(
            Curso::class,
            'cursosXdivisions',
            'id_division',
            'id_curso'
        )->withPivot('turno');
    }
}
