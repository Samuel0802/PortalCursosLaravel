<?php

namespace Database\Seeders;

use App\Models\StatusUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusUsersSeeder extends Seeder
{

    public function run(): void
    {
        // Capturar possíveis exceções durante a execução do seeder.
      try {
          // Se não encontrar o registro com o nome e o id, cadastra o registro no BD
        StatusUsers::firtsOrCreate(
            ['name' => 'Ativo', 'id' => 1],
            ['id' => 1, 'name' => 'Ativo'],
        );
      } catch (\Exception $e) {
         // Lidar com a exceção
      }

       // Capturar possíveis exceções durante a execução do seeder.
      try {
        StatusUsers::firtsOrCreate(
            ['name' => 'Inativo', 'id' => 2],
            ['id' => 2, 'name' => 'Inativo'],
        );

        StatusUsers::firtsOrCreate(
            ['name' => 'Aguardando Confirmação', 'id' => 3],
            ['id' => 3, 'name' => 'Aguardando Confirmação'],
        );

        StatusUsers::firtsOrCreate(
            ['name' => 'Spam', 'id' => 4],
            ['id' => 4, 'name' => 'Spam'],
        );
      } catch (\Exception $e) {
         // Lidar com a exceção
      }
    }
}
