<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class StatusUsers extends Model implements Auditable
{
      use \OwenIt\Auditing\Auditable;

      // Indicar o nome da tabela
    protected $table = 'status_users';

     // Indicar quais colunas podem ser manipuladas
    protected $fillable = [
        'name'
    ];
}
