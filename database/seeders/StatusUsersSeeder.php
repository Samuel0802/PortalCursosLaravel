<?php

namespace Database\Seeders;

use App\Models\StatusUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusUsersSeeder extends Seeder
{

    public function run(): void
    {


        // Se não encontrar o registro com o nome e o id, cadastra o registro no BD
        StatusUsers::firstOrCreate(
            ['name' => 'Ativo'],


        );

        StatusUsers::firstOrCreate(
            ['name' => 'Inativo'],

        );

        StatusUsers::firstOrCreate(
            ['name' => 'Aguardando Confirmação'],

        );

        StatusUsers::firstOrCreate(
            ['name' => 'Spam'],


        );
    }
}
