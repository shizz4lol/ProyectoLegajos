<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
class CursoSeeder extends Seeder
{

    public function run(): void
    {
        Curso::create([]);//curso 1
        Curso::create([]);//curso 2
        Curso::create([]);//curso 3
        Curso::create([]);//curso 4
        Curso::create([]);//curso 5
        Curso::create([]);//curso 6
    }
}
