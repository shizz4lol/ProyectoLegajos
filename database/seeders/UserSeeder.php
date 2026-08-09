<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'tipo_rol'=>'Secretaria',
            'password'=>'R1Secre2026'
        ]);
        User::create([
            'tipo_rol'=>'Jefe',
            'password'=>'R2JefePrece2026'
        ]);
        User::create([
            'tipo_rol'=>'Preceptor',
            'password'=>''
        ]);
    }
}
