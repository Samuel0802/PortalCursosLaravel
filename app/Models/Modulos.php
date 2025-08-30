<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Modulos extends Model implements Auditable
{
     use \OwenIt\Auditing\Auditable;

    protected $table = 'modulos';

    protected $fillable = [
        'name',
    ];
}
