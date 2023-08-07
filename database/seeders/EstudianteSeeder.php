<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $estudiantes = Estudiante::factory(50)->create();
    }
}
