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
    ];
}
