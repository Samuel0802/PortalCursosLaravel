<?php

namespace Database\Seeders;

use App\Models\CursosGrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosGrupoSeeder extends Seeder
{

    public function run(): void
    {
        // Se não encontrar o registro com o nome, cadastra o registro no BD
        CursosGrupo::firstOrCreate(
            ['name' => 'Turma 1', 'curso_id' => 1],

        );

        CursosGrupo::firstOrCreate(
            ['name' => 'Turma 2', 'curso_id' => 2],

        );


        CursosGrupo::firstOrCreate(
            ['name' => 'Turma 3', 'curso_id' => 3],

        );
    }
}

