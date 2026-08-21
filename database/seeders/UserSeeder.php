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
            'password'=>'maria1'
        ]);
        User::create([
            'nombre'=>'carla',
            'tipo_rol'=>'secretaria',
            'password'=>'carla1'
        ]);
        User::create([
            'nombre'=>'charly',
            'tipo_rol'=>'jefe',
            'password'=>'carlos'
        ]);
        User::create([
            'nombre'=>'malen2',
            'tipo_rol'=>'preceptor',
            'password'=>'malen'
        ]);
    }
}
