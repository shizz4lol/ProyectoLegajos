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
            'nombre'=>'secretaria',
            'tipo_rol'=>'secretaria',
            'password'=>'secre1'
        ]);
        User::create([
            'nombre'=>'jefe',
            'tipo_rol'=>'jefe',
            'password'=>'jefe1'
        ]);
        User::create([
            'nombre'=>'preceptor',
            'tipo_rol'=>'preceptor',
            'password'=>'prece1'
        ]);
    }
}
