<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoPorDivisionSeeder extends Seeder
{
    public function run(): void
{
    DB::table('cursosXdivisions')->insert([
        [
            'id_curso' => 1,
            'id_division' => 1,
            'codigo' => 'C2027_1ro1ra',
            'turno' => 'Mañana',
        ],
        [
            'id_curso' => 1,
            'id_division' => 2,
            'codigo' => 'C2027_1ro2da',
            'turno' => 'Tarde',
        ],
        [
            'id_curso' => 1,
            'id_division' => 3,
            'codigo' => 'C2027_1ro3ra',
            'turno' => 'Mañana',
        ],
        [
            'id_curso' => 1,
            'id_division' => 4,
            'codigo' => 'C2027_1ro4ta',
            'turno' => 'Tarde',
        ],
        [
            'id_curso' => 1,
            'id_division' => 5,
            'codigo' => 'C2027_1ro5ta',
            'turno' => 'Mañana',
        ],
        [
            'id_curso' => 1,
            'id_division' => 6,
            'codigo' => 'C2027_1ro6ta',
            'turno' => 'Tarde',
        ],
    ]);
}
}
