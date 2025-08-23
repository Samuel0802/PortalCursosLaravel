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
            [
                'name' => 'Introdução ao PHP',
                'created_at' => null,
                'updated_at' => null,
            ]
        );

        Modulos::firstOrCreate(
            [
                'name' => 'Criação de sistema com Laravel Basico',
                'created_at' =>  null,
                'updated_at' =>  null,
            ]
        );

        Modulos::firstOrCreate(
            [
                'name' => 'Criação de sistema com Laravel Avançado',
                'created_at' =>  null,
                'updated_at' =>  null,
            ]
        );
    }
}
