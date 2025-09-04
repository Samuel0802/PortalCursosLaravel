<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Cursos;
use App\Models\Modulos;

class CursosGrupo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'cursos_grupos';

    protected $fillable = [
        'name',
    ];

   //Criar relacionamento entre um para muitos
    public function modulo(){
        return $this->hasMany(Modulos::class);
    }

    //Criar relacionamento entre um para muitos
    public function curso(){

        //belongsTo é o inverso: muitos para um
        //Muitos grupos -> 1 curso
        return $this->belongsTo(Cursos::class);
    }


}
