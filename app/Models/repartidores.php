<?php
namespace App\Models;

use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class repartidores extends Model
{
    
    use SoftDeletes;
    /*protected $fillable =['Nombre','app','apm','sexo','edad','colonia','calle','cp','nss','fechanacimiento','fechaingreso','horariotrabajo','nombremergencias','telemergencia']; //Mass Assignment*/
    
    protected $table = "repartidores";
    protected $primaryKey = 'idrep';

    protected $guarded = [];

	public $timestamps = false;
}
