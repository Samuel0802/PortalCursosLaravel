<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\CursosGrupo;
use App\Models\Aulas;

class Modulos extends Model implements Auditable
{
     use \OwenIt\Auditing\Auditable;

    protected $table = 'modulos';

    protected $fillable = [
        'name',
    ];

    //Relacionamento de um para muitos
    public function cursosGrupo(){
          //belongsTo é o inverso: muitos para um
        //muitos Modulos -> 1 curso grupo
        return $this->belongsTo(CursosGrupo::class,  'curso_grupos_id');
    }
//Relacionamento de um para muitos
    public function aulas(){
          //hasMany é: um para muitos
        //muitas aulas -> 1 modulo
        return $this->hasMany(Aulas::class);
    }
}
