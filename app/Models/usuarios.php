<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class usuarios extends Model
{
    use HasFactory;
    use Softdeletes;
    
    protected $primaryKey='idusu';
    protected $fillable=['idusu','usuario','contraseña','correo','aceptor'];
}
