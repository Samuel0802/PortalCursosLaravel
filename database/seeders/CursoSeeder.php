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
            [
                'name' => 'Curso PHP',
                'created_at' => null,
                'updated_at' => null
            ],

         );


         Cursos::firstOrCreate(
            [
                'name' => 'Curso Laravel Basico',
                'created_at' => null,
                'updated_at' => null
            ],

         );

         Cursos::firstOrCreate(
            [
                'name' => 'Curso Laravel Avançado',
                'created_at' => null,
                'updated_at' => null
            ],

         );

    }
}
