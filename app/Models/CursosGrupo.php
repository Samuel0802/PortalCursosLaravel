<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursosGrupo extends Model
{
    protected $table = 'cursos_grupos';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
}
