<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Redirect;
use App\Models\clientes;
use App\Models\estados;
use App\Models\municipios;
use App\Models\tarjeta;


class clienteController extends Controller
{
    public function vista(){ 
      $estado = estados::all();
      $municipio = municipios::all();
      return view('registracliente',compact("estado","municipio"));
    }

    public function altacliente(Request $request){

      $this->validate($request,[
         'nombre'=>'required|min:4|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
         'app'=>'required|min:4|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
         'apm'=>'required|min:4|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
         'sexo'=>'required', 
         'edad'=>'required|regex:/^[0-9]{2}+$/',
         'telefono'=>'required|min:8|max:10|regex:/^[0-9]{10}+$/',
         'colonia'=>'required|regex:/^([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-])+((\s*)+([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-]*)*)+$/',
         'calle'=>'required|regex:/^([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-])+((\s*)+([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-]*)*)+$/',
         'cp'=>'required|min:5|max:5|regex:/^[0-9]{5}+$/',
         'foto'=>'image|mimes:gif,jpg,jpeg,png',
         'correo'=>'required|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
         'contraseña'=>'required|min:8',
       ]);

       $file = $request->file('foto');
       if($file<>""){
       $foto = $file->getClientOriginalName();
       $foto2 = $request->idcli . $foto;
       \Storage::disk('local')->put($foto2, \File::get($file));
       }else{
         $foto2 = "sinfoto.jpg";
       }

       $cl = new clientes;
       $cl->idcli = $request->idcli;
       $cl->nombre = $request->nombre;
       $cl->app = $request->app;
       $cl->apm =$request->apm;
       $cl->sexo =$request->sexo;
       $cl->edad =$request->edad;
       $cl->telefono =$request->telefono;
       $cl->idest =$request->idest;
       $cl->idmun =$request->idmun;
       $cl->colonia =$request->colonia;
       $cl->calle =$request->calle;
       $cl->cp =$request->cp;
       $cl->foto = $foto2;
       $cl->correo =$request->correo;
       $cl->contraseña = bcrypt($request->contraseña);
       $cl->save();

       Log::info('Se dio de alta un nuevo usuario: ');
       Session::flash('message','Se guardo con exito');
       return Redirect::to('/registracliente');
      }

      public function mostrarcliente(){
        $clientes = clientes::withTrashed()->with('estado','municipio')
        ->paginate('10');
        return view ('mostrarcliente')->with('clientes',$clientes);
      }

      public function desactivac($idcli){
        $clientes = clientes::find($idcli);
        $clientes->delete();
        Session::flash('message','El cliente se desactivo correctamente');
        Log::info('Se desactivo el usuario con el id: '.$idcli);
        return Redirect::to('/mostrarcliente');
      }

      public function activac($idcli){
        $clientes = clientes::withTrashed()->where('idcli',$idcli)->restore();
        Log::info('Se activo el usuario con el id: '.$idcli);
        Session::flash('message','El cliente se activo correctamente');
        return Redirect::to('/mostrarcliente');
      }

      public function borrarc($idcli){
        $busca = tarjeta::where('idcli',$idcli)->get();
        $cuantos = count($busca);
        if($cuantos==0){
          $clientes = clientes::withTrashed()->find($idcli)->forceDelete();
          Session::flash('message','El cliente se elimino del sistema');
          Log::alert('Se elimino el usuario con el id: '.$idcli);
          return Redirect::to('/mostrarcliente');
        }else{
          Session::flash('message','El cliente no se puede eliminar ya que tiene regsitros de pagos con tarjeta');
        }
      }

      public function modcliente($idcli){

         $clientes = clientes::withTrashed()->findOrFail($idcli);
         $estado = DB::SELECT("SELECT estado,idest FROM estados ");
         //$estado = \DB::table('estado')->pluck('estado','idest');
         $municipio = DB::SELECT("SELECT municipio,idmun FROM municipios ");
         //$municipio = \DB::table('municipio')->pluck('municipio','idmun');

         //dd($estado);
        return view('modcliente', compact('clientes','estado','municipio'));
      }

      public function guardac(Request $request, $idcli){

        $this->validate($request,[
           'nombre'=>'required|min:4|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
           'app'=>'required|min:4|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
           'apm'=>'required|min:4|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
           'sexo'=>'required',
           'edad'=>'required',
           'telefono'=>'required|min:8|max:10|regex:/^[0-9]{10}+$/',
           'colonia'=>'required|regex:/^([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-])+((\s*)+([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-]*)*)+$/',
           'calle'=>'required|regex:/^([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-])+((\s*)+([0-9a-zA-ZÃ±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš_-]*)*)+$/',
           'cp'=>'required|min:5|max:5|regex:/^[0-9]{5}+$/',
           'foto'=>'image|mimes:gif,jpg,jpeg,png',
           'correo'=>'required|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
           'contraseña'=>'required|min:8',
         ]);

         $file = $request->file('foto');
         if($file<>""){
         $foto = $file->getClientOriginalName();
         $foto2 = $request->idcli . $foto;
         \Storage::disk('local')->put($foto2, \File::get($file));
         }
  	       $cli = clientes::findOrFail($idcli);
           $cli->idcli = $request->idcli;
           $cli->nombre = $request->nombre;
           $cli->app = $request->app;
           $cli->apm =$request->apm;
           $cli->sexo =$request->sexo;
           $cli->edad =$request->edad;
           $cli->telefono =$request->telefono;
           $cli->idest =$request->idest;
           $cli->idmun =$request->idmun;
           $cli->colonia =$request->colonia;
           $cli->calle =$request->calle;
           $cli->cp =$request->cp;
           if($file<>""){
           $cli->foto = $foto2;
            }
           $cli->correo =$request->correo;
           $cli->contraseña = bcrypt($request->contraseña);
  			   $cli->save();
           //$clientes = clientes::findOrFail($idcli)->update( $request->all() );

        return Redirect::to('/mostrarcliente')->with('message','El registro ha sido modificado');
    }
}
