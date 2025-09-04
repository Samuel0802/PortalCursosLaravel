<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\CursosGrupo;
use App\Models\CursosStatus;

class Cursos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'cursos';

    public $timestamps = true;


    protected $fillable = [
        'name',
        'curso_status_id'
    ];


    //Criar relacionamento entre um para muitos
    public function cursoGrupo()
    {
        //hasMany é: um para muitos
        //1 curso -> muitos grupos
        return $this->hasMany(CursosGrupo::class);
    }

    public function cursoStatus()
    {
        //belongsTo é o inverso: muitos para um
        //muitos curso -> 1 status
        return $this->belongsTo(CursosStatus::class);
    }
}
