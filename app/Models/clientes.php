<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class clientes extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $table="clientes";
    protected $primaryKey = 'idcli';
    protected $fillable = ['idcli','nombre', 'app', 'apm', 'sexo', 'edad', 'telefono', 'idest', 'idmun', 'colonia', 'calle', 'cp', 'foto', 'correo', 'contraseña'];

    public function pedido(){
    return $this->hasMany(pedidos::class,'idcli');
    }

    public function estado()
    {
      return $this->belongsTo(estados::class,'idest','idest');
    }

    public function municipio()
    {
      return $this->belongsTo(municipios::class,'idmun','idmun');
    }
}