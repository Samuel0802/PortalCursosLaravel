<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //******* Role Seeder: São os papeis de permissão dos usuários ********/

        //Se não encontrar o registro com o Super Admin, cadastra o registro no BD
        $superAdmin = Role::firstOrCreate(

            ['name' => 'Super Admin'],
            ['name' => 'Super Admin'],

        );

        //******* Permissão do Admin *******/

        //Se não encontrar o registro com o admin, cadastra o registro no BD */
        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );

        //Cadastrar a permissão do admin no BD - são os papeis de permissão dos usuários

        //As paginas que admin tem permissão
        $admin->givePermissionTo([
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
            //Permissao para criar e editar a permissão dos usuários
            'edit.permissao.users',

            'index.status_users',
            'show.status_users',
            'create.status_users',
            'edit.status_users',
            'destroy.status_users',
        ]);



        //******* Permissão do Professor *******/

        //Se não encontrar o registro com o professor, cadastra o registro no BD
        $professor = Role::firstOrCreate(

            ['name' => 'Professor'],
            ['name' => 'Professor'],

        );

        //As paginas que professor tem permissão
        $professor->givePermissionTo([
            'dashboard',
            'index.cursos',
            'show.cursos',
            'create.cursos',
            'edit.cursos',

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

            'show.profile',
            'edit.profile',
            'edit_password.profile',

            'index.users',
            'show.users',

        ]);

        //******* Permissão do Tutor *******/

        //Se não encontrar o registro com o Tutor, cadastra o registro no BD
        $tutor = Role::firstOrCreate(

            ['name' => 'Tutor'],
            ['name' => 'Tutor'],

        );

        //As paginas que tutor tem permissão
        $tutor->givePermissionTo([
            'dashboard',

            'index.cursos',
            'show.cursos',
            'edit.cursos',

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

            'show.profile',
            'edit.profile',
            'edit_password.profile',

            'index.users',
            'show.users',
            'create.users',



        ]);

        //******* Permissão do Aluno *******/

        //Se não encontrar o registro com o aluno, cadastra o registro no BD
        $aluno = Role::firstOrCreate(
            ['name' => 'Aluno'],
            ['name' => 'Aluno'],

        );

        $aluno->givePermissionTo([
            'dashboard',

            'index.cursos',
            'show.cursos',

            'index.turmas',
            'show.turmas',

            'index.modulos',
            'show.modulos',

            'index.aulas',
            'show.aulas',

            'show.profile',
            'edit.profile',
            'edit_password.profile',


        ]);
    }
}
