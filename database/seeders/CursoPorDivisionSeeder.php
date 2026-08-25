<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;
use App\Models\Division;

class CursoPorDivisionSeeder extends Seeder
{
    public function run(): void{
    // Cursos
    $curso1 = Curso::where('curso', '1°')->first();
    $curso2 = Curso::where('curso', '2°')->first();
    $curso3 = Curso::where('curso', '3°')->first();
    $curso4 = Curso::where('curso', '4°')->first();
    $curso5 = Curso::where('curso', '5°')->first();
    $curso6 = Curso::where('curso', '6°')->first();

    // Divisiones
    $div1 = Division::where('division', '1°')->first();
    $div2 = Division::where('division', '2°')->first();
    $div3 = Division::where('division', '3°')->first();
    $div4 = Division::where('division', '4°')->first();
    $div5 = Division::where('division', '5°')->first();
    $div6 = Division::where('division', '6°')->first();

    DB::table('cursosXdivisions')->insert([

        // 1° curso
        [
            'id_curso' => $curso1->id,
            'id_division' => $div1->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso1->id,
            'id_division' => $div2->id,
            'turno' => 'Tarde'
        ],
        [
            'id_curso' => $curso1->id,
            'id_division' => $div3->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso1->id,
            'id_division' => $div4->id,
            'turno' => 'Tarde'
        ],
        [
            'id_curso' => $curso1->id,
            'id_division' => $div5->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso1->id,
            'id_division' => $div6->id,
            'turno' => 'Tarde'
        ],

        // 2° curso
        [
            'id_curso' => $curso2->id,
            'id_division' => $div1->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso2->id,
            'id_division' => $div2->id,
            'turno' => 'Tarde'
        ],
        [
            'id_curso' => $curso2->id,
            'id_division' => $div3->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso2->id,
            'id_division' => $div4->id,
            'turno' => 'Tarde'
        ],
        [
            'id_curso' => $curso2->id,
            'id_division' => $div5->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso2->id,
            'id_division' => $div6->id,
            'turno' => 'Tarde'
        ],

        // 3° curso
        [
            'id_curso' => $curso3->id,
            'id_division' => $div1->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso3->id,
            'id_division' => $div2->id,
            'turno' => 'Tarde'
        ],
        [
            'id_curso' => $curso3->id,
            'id_division' => $div3->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso3->id,
            'id_division' => $div4->id,
            'turno' => 'Tarde'
        ],
        [
            'id_curso' => $curso3->id,
            'id_division' => $div5->id,
            'turno' => 'Mañana'
        ],
        [
            'id_curso' => $curso3->id,
            'id_division' => $div6->id,
            'turno' => 'Tarde'
        ],

        // 4° curso
        [
            'id_curso' => $curso4->id,
            'id_division' => $div1->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso4->id,
            'id_division' => $div2->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso4->id,
            'id_division' => $div3->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso4->id,
            'id_division' => $div4->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso4->id,
            'id_division' => $div5->id,
            'turno' => 'Noche'
        ],

        // 5° curso
        [
            'id_curso' => $curso5->id,
            'id_division' => $div1->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso5->id,
            'id_division' => $div2->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso5->id,
            'id_division' => $div3->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso5->id,
            'id_division' => $div4->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso5->id,
            'id_division' => $div5->id,
            'turno' => 'Noche'
        ],

        // 6° curso
        [
            'id_curso' => $curso6->id,
            'id_division' => $div1->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso6->id,
            'id_division' => $div2->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso6->id,
            'id_division' => $div3->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso6->id,
            'id_division' => $div4->id,
            'turno' => 'Noche'
        ],
        [
            'id_curso' => $curso6->id,
            'id_division' => $div5->id,
            'turno' => 'Noche'
        ],
    ]);
    }
}

