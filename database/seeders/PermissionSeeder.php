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
            'index.cursos',
            'show.cursos',
            'create.cursos',
            'edit.cursos',
            'destroy.cursos',

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
