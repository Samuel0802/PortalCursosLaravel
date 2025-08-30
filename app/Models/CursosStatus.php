<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CursosStatus extends Model  implements Auditable
{
       use \OwenIt\Auditing\Auditable;

    protected $table = 'cursos_statuses';

    protected $fillable = [
        'name',
    ];
}
