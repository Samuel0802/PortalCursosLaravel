<?php

namespace Database\Seeders;

use App\Models\CursosStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosStatusSeeder extends Seeder
{

    public function run(): void
    {
        // Capturar possíveis exceções durante a execução do seeder.
        try {
              // Se não encontrar o registro com o nome, cadastra o registro no BD
            CursosStatus::firtsOrCreate(
                ['name' => 'Ativo', 'id' => 1],
                ['id' => 1, 'name' => 'Ativo'],
            );

            CursosStatus::firtsOrCreate(
                ['name' => 'Inativo', 'id' => 2],
                ['id' => 2, 'name' => 'Inativo'],
            );

            CursosStatus::firtsOrCreate(
                ['name' => 'Análise', 'id' => 3],
                ['id' => 3, 'name' => 'Análise'],
            );

        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
