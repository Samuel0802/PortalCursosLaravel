<?php

namespace Database\Seeders;

use App\Models\Aulas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AulasSeeder extends Seeder
{

    public function run(): void
    {
        // Se não encontrar o registro com o nome, cadastra o registro no BD
        Aulas::firstOrCreate(
            [
                'name' => 'Apresentação do Curso',
                'created_at' => null,
                'updated_at' => null,
            ]
        );

        Aulas::firstOrCreate(
            [
              'name' => 'Preparar o Ambiente de Desenvolvimento',
                'created_at' => null,
                'updated_at' => null
            ]
            );

         Aulas::firstOrCreate(
            [
                'name' => 'Criar a base do projeto',
                'created_at' => null,
                'updated_at' => null
            ]
         );
    }
}
