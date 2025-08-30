<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cursos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'cursos';

    public $timestamps = true;


    protected $fillable = [
       'name'
    ];



}
