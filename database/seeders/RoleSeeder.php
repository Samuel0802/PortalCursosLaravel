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
            'index.cursos',
            'show.cursos',
            'create.cursos',
            'edit.cursos',
            'destroy.cursos',
        ]);



        //******* Permissão do Professor *******/

        //Se não encontrar o registro com o professor, cadastra o registro no BD
        $professor = Role::firstOrCreate(

            ['name' => 'Professor'],
            ['name' => 'Professor'],

        );

        //As paginas que professor tem permissão
        $professor->givePermissionTo([
            'index.cursos',
            'show.cursos',
            'create.cursos',
            'edit.cursos',
            'destroy.cursos',
        ]);

        //******* Permissão do Tutor *******/

        //Se não encontrar o registro com o Tutor, cadastra o registro no BD
        $tutor = Role::firstOrCreate(

            ['name' => 'Tutor'],
            ['name' => 'Tutor'],

        );

        //As paginas que tutor tem permissão
        $tutor->givePermissionTo([
            'index.cursos',
            'show.cursos',
            'edit.cursos',
        ]);

        //******* Permissão do Aluno *******/

        //Se não encontrar o registro com o aluno, cadastra o registro no BD
      $aluno = Role::firstOrCreate(
            ['name' => 'Aluno'],
            ['name' => 'Aluno'],
        );
    }
}
