<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarjeta extends Model
{
    use HasFactory;
    protected $table="tarjeta";
    protected $primaryKey = 'idtar';
    protected $fillable = ['idtar','idcli', 'tipo', 'banco', 'numtarj', 'numseguro', 'idali'];
}
