<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\municipios;
use App\Models\estados;
use App\Models\categorias;
use App\Models\restaurantes;
use Session;

 

class controladorrestaurante extends Controller
{

    public function altares(){
        
        $estado=estados::orderBy('estado','DESC')->get();
        $municipio=municipios::orderBy('municipio','DESC')->get();
        $categoria=categorias::orderBy('categoria','DESC')->get();

        return view ('altarestaurante')
        ->with('estado',$estado)
        ->with('categoria',$categoria)
        ->with('municipio',$municipio); 
    }

    public function guardarres(Request $request){
        //return $request;
        //dd($request);
        $this->validate($request,[
            'res' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'nombrecont' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^[0-9]{10}$/',
            'rfc' => 'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/',
            'cp' => 'required|regex:/^[0-9]{5}$/',
            'estado' => 'required',
            'categoria' => 'required',
            'municipio' => 'required',
        ]);

        $restaurante=new restaurantes;
        $restaurante->razonsocial=$request->res;
        $restaurante->nombrecontacto=$request->nombrecont;
        $restaurante->correo=$request->correo;
        $restaurante->telefono=$request->telefono;
        $restaurante->rfc=$request->rfc;
        $restaurante->cp=$request->cp;
        $restaurante->idcat=$request->categoria;
        $restaurante->idest=$request->estado;
        $restaurante->idmun=$request->municipio;
        $restaurante->save();
        /*return view ('mensaje')
        ->with('proceso','Alta de restaurante')
        ->with('mensaje',"El restaurante $restaurante->razonsocial fue registrado")
        ->with('error',1);*/
        Session::flash('mensaje',"El restaurante ha sido agregado correctamente");
        return redirect()->route('res');
    }

    public function activares($idres){
        //echo "EL elmiminado es :$idres";
        $restaurante= restaurantes::withTrashed()->where('idres',$idres)->restore();
        /*return view('mensaje')
        ->with('proceso','Activar Restaurantes')
        ->with('mensaje','El restaurante ha sido activado correctamente')
        ->with('error',1);*/
        Session::flash('mensaje',"El restaurante ha sido activado correctamente");
        return redirect()->route('res');
    }
    public function desacres($idres){
        //echo "EL elmiminado es :$idres";
        $restaurante= restaurantes::find($idres);
        $restaurante->delete();
        /*return view('mensaje')
        ->with('proceso','Desactivar Restaurantes')
        ->with('mensaje','El restaurante ha sido dado desactivado correctamente')
        ->with('error',1);*/
        Session::flash('mensaje',"El restaurante ha sido desactivado correctamente");
        return redirect()->route('res');
    }
    public function borrares($idres){
        //echo "EL elmiminado es :$idres";
        /*
        $buscar=nominas::find('idres',idres);
        $contar=count($buscar);
        if($contar==0){
        $restaurante= restaurantes::withTrashed()->find($idres)->forceDelete();
        */
        /*return view('mensaje')
        ->with('proceso','Borrar Restaurantes')
        ->with('mensaje','El restaurante ha sido borrado correctamente')
        ->with('error',1);*/
        Session::flash('mensaje',"El restaurante ha sido eliminado correctamente");
        return redirect()->route('res');
        /*
        }
        else{
        Session::flash('mensaje',"El restaurante no a podido ser eliminado correctamente porque existe registros suyos");
        return redirect()->route('res');
        }*/
    }

    public function index(){
        return view ('index');
    }
    
    public function res(){
        $restaurante=restaurantes::withTrashed()->join('categorias','restaurantes.idcat','=','categorias.idcat')
        ->select('restaurantes.idres','restaurantes.razonsocial','restaurantes.nombrecontacto','restaurantes.correo','restaurantes.telefono','restaurantes.cp','restaurantes.deleted_at','categorias.categoria')
        ->orderBy('restaurantes.razonsocial')
        ->get();
        return view ('restaurante')->with('resta',$restaurante);
    }
    public function modificares($idres){
        $restaurante=restaurantes::withTrashed()->join('categorias','restaurantes.idcat','=','categorias.idcat')
        ->join('estados','restaurantes.idest','=','estados.idest')
        ->join('municipios','restaurantes.idmun','=','municipios.idmun')
        ->select('restaurantes.idres','restaurantes.razonsocial','restaurantes.nombrecontacto','restaurantes.correo','restaurantes.telefono','restaurantes.rfc','restaurantes.cp','restaurantes.deleted_at','categorias.categoria','categorias.idcat AS idcate','estados.estado','estados.idest as idesta','municipios.municipio','municipios.idmun as idmuni')
        ->where('idres',$idres)
        ->get();
        $estado=estados::all();
        $municipio=municipios::all();
        $categoria=categorias::all();

        
        return view ('modificares')
        ->with('restaurante',$restaurante[0])
        ->with('estado',$estado)
        ->with('categoria',$categoria)
        ->with('municipio',$municipio);

    }
    public function guardacares(Request $request){
        $this->validate($request,[
            'idres'=>'required',
            'res' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'nombrecont' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^[0-9]{10}$/',
            'rfc' => 'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/',
            'cp' => 'required|regex:/^[0-9]{5}$/',
            'esta' => 'required',
            'cate' => 'required',
            'muni' => 'required',
        ]);
        //echo "$request";
        $restaurante=restaurantes::withTrashed()->find($request->idres);
        $restaurante->razonsocial=$request->res;
        $restaurante->nombrecontacto=$request->nombrecont;
        $restaurante->correo=$request->correo;
        $restaurante->telefono=$request->telefono;
        $restaurante->rfc=$request->rfc;
        $restaurante->cp=$request->cp;
        $restaurante->idcat=$request->cate;
        $restaurante->idest=$request->esta;
        $restaurante->idmun=$request->muni;
        $restaurante->save();

        /*return view ('mensaje')
        ->with('proceso','Modificacion del restaurante')
        ->with('mensaje',"El restaurante $restaurante->razonsocial fue Modificado exitosamente")
        ->with('error',1);*/
        Session::flash('mensaje',"El restaurante $request->nombrecont ha sido modificado correctamente");
        return redirect()->route('res');
        
    }
    
    

}
