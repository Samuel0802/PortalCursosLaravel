<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Aulas extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    protected $table = 'aulas';



    protected $fillable = [
      'name',
      'modulos_id'
    ];

    //Relacionamento de um para muitos
    public function modulos(){
          //hasMany é: um para muitos
        //1 modulo -> para muitas aulas
        return  $this->belongsTo(Modulos::class);
    }
}
