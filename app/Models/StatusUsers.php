<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusUsers extends Model
{
    // Indicar o nome da tabela
    protected $table = 'status_users';

     // Indicar quais colunas podem ser manipuladas
    protected $fillable = [
        'id',
        'name'
    ];
}
