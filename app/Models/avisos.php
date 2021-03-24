<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class avisos extends Model
{
     protected $table = "avisos";
    protected $primaryKey = 'idavi';
    protected $guarded = [];
    public $timestamps = false;
}
