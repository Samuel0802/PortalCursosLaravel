<?php

namespace Database\Seeders;

use App\Models\CursosStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosStatusSeeder extends Seeder
{

    public function run(): void
    {

        // Se não encontrar o registro com o nome, cadastra o registro no BD
        CursosStatus::firstOrCreate(
            ['name' => 'Ativo', ],


        );

        CursosStatus::firstOrCreate(
            ['name' => 'Inativo'],

        );

        CursosStatus::firstOrCreate(
            ['name' => 'Análise'],

        );
    }
}
