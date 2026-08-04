<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
    public function cursos():BelongsToMany{
        return $this->belongsToMany(
            Curso::class,
            'cursosXdivisions',
            'id_division',
            'id_curso'
        );
    }
}
