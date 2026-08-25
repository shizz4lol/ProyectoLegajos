<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division; 

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        Division::create([
        'division'=>'1°'
        ]);//div 1
        Division::create([
            'division'=>'2°'
        ]);//div 2
        Division::create([
            'division'=>'3°'
        ]);//div 3
        Division::create([
            'division'=>'4°'
        ]);//div 4
        Division::create([
            'division'=>'5°'
        ]);//div 5
        Division::create([
            'division'=>'6°'
        ]);//div 5
    }
}
