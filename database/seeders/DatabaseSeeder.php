<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

     //Seeds que deve rodar em produção
        if (App::environment('production')) {
            $this->call([
                UserSeeder::class,
                StatusUsersSeeder::class,
                CursosStatusSeeder::class,
            ]);
        }

        //Seeds que deve rodar em qualquer ambiente
        if (!App::environment('production')) {
            $this->call([
                UserSeeder::class,
                StatusUsersSeeder::class,
                CursoSeeder::class,
                CursosStatusSeeder::class,
                CursosGrupoSeeder::class,
                ModulosSeeder::class,
                AulasSeeder::class,
            ]);
        }
    }
}
