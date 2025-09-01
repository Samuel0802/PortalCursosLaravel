<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('aulas', function (Blueprint $table) {
            //chave estrangeira na tabela aulas
            $table->foreignId('modulos_id')
             //criar a coluna após nome
             ->after('name')
              //Chave primeira a tabela modulos
              ->constrained('modulos')
              // se o ID da tabela pai mudar, ele atualiza aqui também
              ->onUpdate('cascade')
              //Impede exclusões se existir registros vinculado
              ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->dropForeign(['modulos_id']);
            $table->dropColumn(['modulos_id']);
        });
    }
};
