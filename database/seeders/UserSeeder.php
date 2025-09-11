<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;


class UserSeeder extends Seeder
{


    public function run(): void
    {
        //Verificar se o usuário está cadastrado no banco de dados.
        //Recuperando apenas o primeiro registro
        if (!User::where('email', 'samuel@gmail.com')->first()) {

            //Cadastrar o usuário
            $superAdmin = User::create([
                'name' => 'Samuel Souza',
                'login' => 'samuel',
                'email' => 'samuel@gmail.com',
                'matricula' => '0001',
                'password' => bcrypt('Samuel123'),
                'user_status_id' => 1,

            ]);

            //Atribuir a permissão para o usuário = Super Admin
             $superAdmin->assignRole('Super Admin');
        }

        if (App::environment() !== 'production') {

            //Se não encontrar o registro com o email, cadastrar o registro no BD
            $admin =  User::firstOrCreate(
                ['email' => 'sam@gmail.com'],

                [
                    'name' => 'Sam',
                    'password' => bcrypt('123456'),
                    'login' => 'sam',
                    'matricula' => '0002',
                    'email' => 'sam@gmail.com',
                ]
            );


            //Atribuir a permissão para o usuário =  Admin
            $admin->assignRole('admin');


            //Se não encontrar o registro com o email, cadastrar o registro no BD
            $professor =  User::firstOrCreate(
                ['email' => 'kamily@gmail.com'],

                [
                    'name' => 'Kamily Vitoria',
                    'password' => bcrypt('123456'),
                    'login' => 'kamily',
                    'matricula' => '0003',
                    'email' => 'kamily@gmail.com',
                ]
            );

            //Atribuir a permissão para o usuário =  Professor
            $professor->assignRole('professor');


            //Se não encontrar o registro com o email, cadastrar o registro no BD
            $tutor =  User::firstOrCreate(
                ['email' => 'pedro@gmail.com'],

                [
                    'name' => 'Pedro Lucas',
                    'password' => bcrypt('123456'),
                    'login' => 'pedro',
                    'matricula' => '0004',
                    'email' => 'pedro@gmail.com',
                ]
            );

            //Atribuir a permissão para o usuário =  Tutor
            $tutor->assignRole('tutor');
            //Permissão de aluno
            $tutor->assignRole('aluno');


        }
    }
}
