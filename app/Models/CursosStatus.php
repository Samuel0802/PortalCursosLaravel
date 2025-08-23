<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursosStatus extends Model
{
    protected $table = 'cursos_statuses';

    protected $fillable = [
        'id',
        'name',
    ];
}
