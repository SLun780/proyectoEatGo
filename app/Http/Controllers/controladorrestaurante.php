<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\municipios;
use App\Models\estados;
use App\Models\categorias;
use App\Models\restaurantes;

 

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
        return view ('mensaje')->with('proceso','Alta de restaurante')->with('mensaje',"El restaurante $restaurante->razonsocial fue registrado");
    }

    public function desacres($idres){
        echo "EL elmiminado es :$idres";
        //$eliminado->eliminado;
        //$borrar=restaurantes::find($eliminado);
        //$borrar->delete();
    }

    public function index(){
        return view ('index');
    }
    
    public function res(){
        $restaurante=restaurantes::all();
        return view ('restaurante')->with('resta',$restaurante);
    }
    
    

}
