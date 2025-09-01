<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Verificar se o usuário está cadastrado no banco de dados.
        //Recuperando apenas o primeiro registro
        if (!User::where('email', 'samuel@gmail.com')->first()) {

            //Cadastrar o usuário
            User::create([
                'name' => 'Samuel Souza',
                'login' => 'samuel',
                'email' => 'samuel@gmail.com',
                'matricula' => 2174,
                'password' => bcrypt('Samuel123'),
                'user_status_id' => 1,

            ]);
        }

        if(App::environment() !== 'production'){

         //Se não encontrar o registro com o email, cadastrar o registro no BD
        User::firstOrCreate(
            ['email' => 'wilson@gmail.com'],

            ['name' => 'Wilson',
            'password' => bcrypt('Wilson123'),
            'matricula' => 2175,
            'email' => 'wilson@gmail.com',

        ],
        );

        }


    }
}
