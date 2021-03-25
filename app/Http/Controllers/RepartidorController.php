<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\repartidores;
use App\Models\municipios;
use App\Models\estados;
use App\Models\vehiculos;
use App\Models\avisos;
use Session;


class RepartidorController extends Controller
{    /**
     * Display a listing of the resource.
    *
    @return \Illuminate\Http\Response
     */
    public function reporterepartidores()
    {
        $consulta = repartidores::withTrashed()->join('municipios', 'repartidores.idmun', '=', 'municipios.idmun')
        ->join('estados', 'repartidores.idest', '=', 'estados.idest')
        ->join('vehiculos', 'repartidores.idve', '=', 'vehiculos.idve')
        ->select('repartidores.idrep', 'repartidores.nombre', 'repartidores.app', 'repartidores.apm',
            'repartidores.colonia',
            'repartidores.nss',
            'repartidores.img',
            'repartidores.fechaingreso',
            'repartidores.horariotrabajo',
            'repartidores.telemergencia', 'municipios.municipio as muni',
            'estados.estado as esta','vehiculos.vehiculo as ve', 'repartidores.deleted_at')
        ->get();
        //return $consulta;
        //$repartidores = repartidores::ALL();
        return view('RegistroRepartidores')->with('repartidor', $consulta);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('RepartidorFormulario');  
        $estado=estados::orderBy('estado','DESC')->get();
        $municipio=municipios::orderBy('municipio','DESC')->get();
        $vehiculo=vehiculos::orderBy('vehiculo','DESC')->get();
        $aviso=avisos::orderBy('aviso','DESC')->get();

        $consulta=repartidores::orderBy('idrep','DESC')
                                ->take(1)->get();
        $cuantos = count($consulta);
        if($cuantos==0)
        {
            $idrsigue = 1;
        }
        else{
            $idrsigue = $consulta[0]->idrep + 1;
        }
        return view("RepartidorFormulario")
            ->with('idsigue',$idrsigue)
            ->with('estado',$estado)
            ->with('municipio', $municipio)
            ->with('vehiculo',$vehiculo)
            ->with('aviso',$aviso);
            
          //return view("RepartidorFormulario")
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$repartidores = new repartidores;
        $this-> validate($request, [
        'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
        'app' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
        'apm' =>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
        'sexo' => 'required',
        'edad' => 'required|numeric',
        'idmun' => 'required',
        'idest' => 'required',
        'colonia' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
        'calle' => 'required|regex:/^[A-Z][A-Z,a-z, , á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
        'cp' => 'required|numeric',
        'nss' => 'required|regex:/^[0-9]{10}$/',
        'fechanacimiento' => 'required|date',
        'fechaingreso' => 'required|date',
        'horariotrabajo' => 'required',
        'idve' => 'required',
        //'nombremergencia'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
        'telemergencia' => 'required|regex:/^[0-9]{10}$/',
        'img' => 'image|mimes:gif,jpeg,png',
        ]);       
       /* $client->create($request->all());
        $clients = Client::all();
        return \View::make('list', compact('clients'));
        */
        $file = $request->file('img');
        if($file<>""){
        $img =$file->getClientOriginalName();
        $img2 =$request->idrep . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 ="User.png";
        }

            $repartidores = new repartidores();
            $repartidores->idrep = $request->get('idrep');
            $repartidores->nombre = $request->get('nombre');
            $repartidores->app = $request->get('app');
            $repartidores->apm = $request->get('apm');
            $repartidores->sexo = $request->get('sexo');
            $repartidores->edad = $request->get('edad');
            $repartidores->idest = $request->get('idest');
            $repartidores->idmun = $request->get('idmun');
            $repartidores->colonia = $request->get('colonia');
            $repartidores->calle = $request->get('calle');
            $repartidores->cp = $request->get('cp');
            $repartidores->nss = $request->get('nss');
            $repartidores->fechanacimiento = $request->get('fechanacimiento');
            $repartidores->fechaingreso = $request->get('fechaingreso');
            $repartidores->horariotrabajo = $request->get('horariotrabajo');
            $repartidores->idve = $request->get('idve');
            $repartidores->nombremergencia = $request->get('nombremergencias');
            $repartidores->telemergencia = $request->get('telemergencia');
            $repartidores->img = $img2;
            $repartidores->id_aviso = $request->get('id_aviso');
            $repartidores->save();
        //echo "registro GUARDADO CORRECTAMENTE";
        //return view('RepartidorFormulario');
        /*return view('RegistroRepartidores')
                ->with('proceso',"ALTA DE REPARTIDORES")
                ->with('mensaje',"El empleado $request->nombre $request->app ha sido dado de alta correctamente");*/
        Session::flash('mensaje', "El repartidores $request->nombre $request->app ha sido creado correctamente");
        return redirect()->route('repar');
    }

    public function desactivarepartidor($idrep){
        //echo "El repartidores eliminado es $idrep";
        $repartidores = repartidores::find($idrep);
        $repartidores->delete();
        /*return view('mensajes')
            ->with('proceso', "DESACTIVAR REPARTIDORES")
            ->with('mensaje', "El repartidores ha sido desactivado correctamente")
            ->with('error', 1);*/
        Session::flash('mensaje', "El repartidores ha sido desactivado correctamente");
        return redirect()->route('repar');
    }

    public function activarepartidor($idrep)
    {
        //echo "El repartidores eliminado es $idrep";4
        $repartidores = repartidores::withTrashed()->where('idrep',$idrep)->restore();
        /*return view('mensajes')
        ->with('proceso', "ACTIVAR REPARTIDORES")
        ->with('mensaje', "El repartidores ha sido activado correctamente")
        ->with('error', 1);*/
        Session::flash('mensaje', "El repartidores ha sido activado correctamente");
        return redirect()->route('repar');
    }

    public function borrarepartidor($idrep)
    {
        //echo "El repartidores eliminado es $idrep";4
        $buscarepartidor= repartidores::where('idrep', $idrep)->get();
        $cuantos =count($buscarepartidor);
        if($cuantos==0){
            $repartidores = repartidores::withTrashed()->find($idrep)->forceDelete();
            /*return view('mensajes')
                ->with('proceso', "BORRAR REPARTIDOR")
                ->with('mensaje', "El repartidores ha sido eliminado del sistema correctamente")
                ->with('error',1);*/
            Session::flash('mensaje', "El repartidores ha sido eliminado del sistema correctamente");
            return redirect()->route('repar');
        }
        else
        {/*
            return view('mensajes')
                ->with('proceso', "BORRAR REPARTIDOR")
                ->with('mensaje', "El repartidores no se puede eliminar del sistema")
                ->with('error', 0);*/
            Session::flash('mensaje', "El repartidores no se ha podido eliminar del sistema");
            return redirect()->route('RegistroRepartidores');
        }
       /* Session::flash('mensaje', "El repartidores $request->nombre $request->app ha sido desactivado correctamente");
        return redirect()->route('RegistroRepartidores');*/
    }

    public function ModificaRepartidor($idrep){
        $consulta = repartidores::withTrashed()->join('municipios', 'repartidores.idmun', '=', 'municipios.idmun')
        ->join('estados', 'repartidores.idest', '=', 'estados.idest')
        ->join('vehiculos', 'repartidores.idve', '=', 'vehiculos.idve')
        ->select('repartidores.idrep','repartidores.nombre','repartidores.app','repartidores.apm','repartidores.colonia',
                'repartidores.nss','repartidores.fechaingreso','repartidores.horariotrabajo','repartidores.telemergencia',
                'municipios.idmun','municipios.municipio as muni','estados.idest','estados.estado as esta','vehiculos.idve','vehiculos.vehiculo as ve','repartidores.edad',
                'repartidores.fechaingreso','repartidores.fechanacimiento','repartidores.nss','repartidores.sexo','repartidores.calle',
                'repartidores.colonia','repartidores.cp','repartidores.nombremergencia','repartidores.telemergencia',
            'repartidores.img'
        )
        ->where('idrep',$idrep)
        ->get();
        $municipio = municipios::ALL();
        $estado = estados::ALL();
        $vehiculo =vehiculos::ALL();
         return view('ModificaRepartidor')
         ->with('consulta',$consulta[0])
         ->with('municipio',$municipio)
         ->with('estado',$estado)
         ->with('vehiculo',$vehiculo);
    }
    
    public function guardacambios(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'app' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'apm' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'sexo' => 'required',
            'edad' => 'required|numeric',
            'idmun' => 'required',
            'idest' => 'required',
            'colonia' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'calle' => 'required|regex:/^[A-Z][A-Z,a-z, , á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'cp' => 'required|numeric',
            'nss' => 'required|regex:/^[0-9]{10}$/',
            'fechanacimiento' => 'required|date',
            'fechaingreso' => 'required|date',
            'horariotrabajo' => 'required',
            'idve' => 'required',
            //'nombremergencia'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'telemergencia' => 'required|regex:/^[0-9]{10}$/',
            'img' => 'image|mimes:gif,jpeg,png',
        ]);

        $file = $request->file('img');
        if ($file <> "") {
            $img = $file->getClientOriginalName();
            $img2 = $request->idrep . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } 
        
        $repartidores = repartidores::withTrashed()->find($request->idrep);
        $repartidores->idrep = $request->get('idrep');
        $repartidores->nombre = $request->get('nombre');
        $repartidores->app = $request->get('app');
        $repartidores->apm = $request->get('apm');
        $repartidores->sexo = $request->get('sexo');
        $repartidores->edad = $request->get('edad');
        $repartidores->idest = $request->get('idest');
        $repartidores->idmun = $request->get('idmun');
        $repartidores->colonia = $request->get('colonia');
        $repartidores->calle = $request->get('calle');
        $repartidores->cp = $request->get('cp');
        $repartidores->nss = $request->get('nss');
        $repartidores->fechanacimiento = $request->get('fechanacimiento');
        $repartidores->fechaingreso = $request->get('fechaingreso');
        $repartidores->horariotrabajo = $request->get('horariotrabajo');
        $repartidores->idve = $request->get('idve');
        if ($file <> "") {
            $repartidores->img = $img2;
        }
        $repartidores->nombremergencia = $request->get('nombremergencias');
        $repartidores->telemergencia = $request->get('telemergencia');
        $repartidores->id_aviso = $request->get('id_aviso');

        $repartidores->save();/*
        return view('mensajes')
        ->with('proceso', "MODIFICA REPARTIDOR")
        ->with('mensaje', "El repartidores $request->nombre $request->app ha sido modificado correctamente")
        ->with('error',1);*/
        Session::flash('mensaje', "El repartidores $request->nombre $request->app ha sido desactivado correctamente");
        return redirect()->route('repar');
            
    }
}
