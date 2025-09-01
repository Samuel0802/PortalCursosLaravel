<?php

namespace Database\Seeders;

use App\Models\Modulos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{

    public function run(): void
    {
        // Se não encontrar o registro com o nome, cadastra o registro no BD
        Modulos::firstOrCreate(
               ['name' => 'Introdução ao Laravel', 'curso_grupos_id' => 8],

        );

        Modulos::firstOrCreate(
             ['name' => 'Criar Sistema de Login', 'curso_grupos_id' => 9],
        );

        // Modulos::firstOrCreate(
        //   ['name' => 'Integrar o Layout', 'id' => 3],
        // );
    }
}
