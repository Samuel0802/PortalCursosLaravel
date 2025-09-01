<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('modulos', function (Blueprint $table) {
            //chave estrangeira na tabela modulos
            $table->foreignId('curso_grupos_id')
            //criar a coluna após nome
                ->after('name')
                //Tabela PAI que possui a chave primaria
                ->constrained('cursos_grupos')
                // se o ID da tabela pai mudar, ele atualiza aqui também
                ->onUpdate('cascade')
                //Impede exclusões se existir registros vinculado
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('modulos', function (Blueprint $table) {
            $table->dropForeign(['curso_grupos_id']);
            $table->dropColumn(['curso_grupos_id']);
        });
    }
};
