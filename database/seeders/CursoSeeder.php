<?php

namespace Database\Seeders;


use App\Models\Cursos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{

    public function run(): void
    {


        // Se não encontrar o registro com o nome, cadastra o registro no BD
        Cursos::firstOrCreate(
            ['name' => 'Curso de Laravel 10', 'curso_status_id' => 1],
        );


        Cursos::firstOrCreate(
            ['name' => 'Curso de Laravel 11', 'curso_status_id' => 1],

        );

        Cursos::firstOrCreate(
            ['name' => 'Curso de Laravel 12', 'curso_status_id' => 1],

        );
    }
}
