<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';

    public $timestamps = true; // Laravel preenche automaticamente data/hora


    protected $fillable = [
       'name'
    ];

//  ALTER TABLE cursos ALTER COLUMN created_at datetime2(0) NULL;
// ALTER TABLE cursos ALTER COLUMN updated_at datetime2(0) NULL;

}
