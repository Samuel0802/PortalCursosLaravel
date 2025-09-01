<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //Chave estrangeira na tabela users
            $table->foreignId('user_status_id')
            //criar a coluna apos coluna name
             ->after('name')
             //valor padrão ativo
             ->default(1)
             //Tabela PAI que possui a chave primaria
             ->constrained('status_users')
             // se o ID da tabela pai mudar, ele atualiza aqui também
             ->onUpdate('cascade');
             //Impede exclusões se existir registro vinculado
            //  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
           // //exclui a chave estrangeira
           $table->dropForeign(['user_status_id']);
           // //exclui a coluna
           $table->dropColumn('user_id');
        });
    }
};
