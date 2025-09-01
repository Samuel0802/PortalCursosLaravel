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
            ['name' => 'Apresentação do Curso'],
            // ['id' => 1, 'name' => 'Apresentação do Curso'],
        );

        Aulas::firstOrCreate(
            ['name' => 'Preparar o Ambiente de Desenvolvimento'],
            // ['id' => 2, 'name' => 'Preparar o Ambiente de Desenvolvimento'],
        );

        Aulas::firstOrCreate(
            ['name' => 'Criar a Base do Projeto'],
            // ['id' => 3, 'name' => 'Criar a Base do Projeto'],
        );
    }
}
