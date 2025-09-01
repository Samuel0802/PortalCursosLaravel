<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    //Relacionamento entre curso_grupo -> cursos
    public function up(): void
    {
        Schema::table('cursos_grupos', function (Blueprint $table) {
          $table->foreignId('curso_id')
              ->nullable()
                //criar a coluna após nome
             ->after('name')
              //Chave primeira a tabela cursos
              ->constrained('cursos')
              ->onUpdate('cascade')
              //se excluir o curso = vai excluir grupo,modulos,aulas
              ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos_grupos', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
            $table->dropColumn('curso_id');
        });
    }
};
