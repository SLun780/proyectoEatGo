<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    use HasFactory;
    protected $primaryKey='idest';
    protected $fillable=['idest','estado'];
}
