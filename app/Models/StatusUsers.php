<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;

class StatusUsers extends Model implements Auditable
{
      use \OwenIt\Auditing\Auditable;

      // Indicar o nome da tabela
    protected $table = 'status_users';

     // Indicar quais colunas podem ser manipuladas
    protected $fillable = [
        'name'
    ];

    //Criar relacionamento entre um para muitos
    public function user(){
        //hasMany é: um para muitos
        //1 status -> muitos usuarios
      return $this->hasMany(User::class);
    }
}
