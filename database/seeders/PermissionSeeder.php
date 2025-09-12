<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //****** REALIZAR O NIVEL DE PERMISSÃO DOS USUÁRIOS *******/

        //Criar o array de permissões no banco de dados
        $permissions = [

            'dashboard',

            'index.cursos',
            'show.cursos',
            'create.cursos',
            'edit.cursos',
            'destroy.cursos',

            'index.turmas',
            'show.turmas',
            'create.turmas',
            'edit.turmas',
            'destroy.turmas',

            'index.modulos',
            'show.modulos',
            'create.modulos',
            'edit.modulos',
            'destroy.modulos',

            'index.aulas',
            'show.aulas',
            'create.aulas',
            'edit.aulas',
            'destroy.aulas',

            'index.cursos_statuses',
            'show.cursos_statuses',
            'create.cursos_statuses',
            'edit.cursos_statuses',
            'destroy.cursos_statuses',

           'show.profile',
           'edit.profile',
           'edit_password.profile',

           'index.users',
           'show.users',
           'create.users',
           'edit.users',
           'edit_password.users',
           'destroy.users',
           //editar a permissão dos usuários
           'edit.permissao.users',

           'index.status_users',
           'show.status_users',
           'create.status_users',
           'edit.status_users',
           'destroy.status_users',

        ];

        foreach ($permissions as  $permission) {

            //Se não encontrar o registro, cadastrar o registro no BD
            Permission::firstOrCreate(
                //condição
                ['name' => $permission],
                ['name' =>  $permission, 'guard_name' => 'web']
            );
        }
    }
}
