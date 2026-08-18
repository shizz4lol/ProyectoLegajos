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
            'nombre'=>'maria3',
            'tipo_rol'=>'secretaria',
            'password'=>'1234'
        ]);
        User::create([
            'nombre'=>'maria3',
            'tipo_rol'=>'jefe',
            'password'=>'12345'
        ]);
        User::create([
            'nombre'=>'maria3',
            'tipo_rol'=>'preceptor',
            'password'=>'pizza'
        ]);
    }
}
