<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    //Relacionamento entre curso -> curso_status
    public function up(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            //chave estrangeira na tabela cursos
            $table->foreignId('curso_status_id')
                //criar a coluna apos coluna name
                ->after('name')
                //valor padrao 1
                ->default(1)
                //Tabela PAI que possui a chave primaria
                ->constrained('cursos_statuses')
                // se o ID da tabela pai mudar, ele atualiza aqui também
                ->onUpdate('cascade');

                //Impede exclusões se existir registros vinculado
                // ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            //exclui a chave estrangeira
            $table->dropForeign(['curso_status_id']);
            //exclui a coluna
            $table->dropColumn('curso_status_id');

        });
    }
};
