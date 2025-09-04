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
            ['name' => 'Apresentação do Curso', 'modulos_id' => 1],
            // ['id' => 1, 'name' => 'Apresentação do Curso'],
        );

        Aulas::firstOrCreate(
            ['name' => 'Preparar o Ambiente de Desenvolvimento' , 'modulos_id' => 2],
            // ['id' => 2, 'name' => 'Preparar o Ambiente de Desenvolvimento'],
        );

        Aulas::firstOrCreate(
            ['name' => 'Criar a Base do Projeto', 'modulos_id' => 3],
            // ['id' => 3, 'name' => 'Criar a Base do Projeto'],
        );
    }
}
