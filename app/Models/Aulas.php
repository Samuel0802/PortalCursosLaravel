<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    protected $table = 'aulas';

    protected $fillable = [
      'name',
    ];
}
