<?php

namespace Database\Seeders;


use App\Models\Cursos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{

    public function run(): void
    {
     // Capturar possíveis exceções durante a execução do seeder.
      try {

        // Se não encontrar o registro com o nome, cadastra o registro no BD
         Cursos::firstOrCreate(
            ['name' => 'Curso PHP', 'id' => 1],
            ['id' => 1, 'name' => 'Curso PHP'],
         );

          // Se não encontrar o registro com o nome, cadastra o registro no BD
         Cursos::firstOrCreate(
            ['name' => 'Curso Laravel Basico', 'id' => 2],
            ['id' => 2, 'name' => 'Curso Laravel'],
         );

         Cursos::firstOrCreate(
            ['name' => 'Curso Laravel Avançado', 'id' => 3],
            ['id' => 3, 'name' => 'Curso Laravel Avançado'],
         );

      } catch (\Exception $e) {
        //throw $th;
      }
    }
}
