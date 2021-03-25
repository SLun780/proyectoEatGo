<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class restaurantes extends Model
{
    use HasFactory;
    use Softdeletes;
    
    protected $primaryKey='idres';
    protected $fillable=['idres','razonsocial','nombrecontacto','correo','telefono','rfc','cp','idcat','idest','img','idmun'];
}
