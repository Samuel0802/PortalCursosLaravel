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
                [
                    'name' => 'Ativo',
                    'created_at' => null,
                    'updated_at' => null,
                ],

            );

            CursosStatus::firstOrCreate(
                [
                    'name' => 'Inativo',
                    'created_at' => null,
                    'updated_at' => null,
                ],

            );

            CursosStatus::firstOrCreate(
                [
                    'name' => 'Análise',
                    'created_at' => null,
                    'updated_at' => null,

                ],

            );


    }
}
