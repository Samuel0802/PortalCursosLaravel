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
            [
                'name' => 'Ativo',
                'created_at' => null,
                'updated_at' => null
            ],

        );



        StatusUsers::firstOrCreate(
            [
                'name' => 'Inativo',
                'created_at' => null,
                'updated_at' => null
            ],

        );

        StatusUsers::firstOrCreate(
            [
                'name' => 'Aguardando Confirmação',
                'created_at' => null,
                'updated_at' => null
            ],

        );

        StatusUsers::firstOrCreate(
            [
                'name' => 'Spam',
                'created_at' => null,
                'updated_at' => null
            ],

        );
    }
}
