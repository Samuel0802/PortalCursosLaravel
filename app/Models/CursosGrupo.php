<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CursosGrupo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'cursos_grupos';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
}
