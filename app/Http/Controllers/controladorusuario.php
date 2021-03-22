<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\usuarios;


class controladorusuario extends Controller
{
    public function login(){
        return view ('login');
    }
    public function altausua(){
        return view ('altausu');
    }
    public function politicaspriva(){
        return view ('politicaspriva');
    }
    public function validacap(Request $request){

        $this->validate($request,[
            'username'=>'required|alpha',
            'contraseña'=>'required|alpha', 
          
        ]);
        Log::info('Se logeo el siguiente usuario: '.$request->usuario);

    }
    public function guardausua(Request $request){
        

        $this->validate($request,[
            'username'=>'required|alpha',
            'contraseña'=>'required',
            'correo'=>'required|email',
            
        ]);
        Log::info('Acepto las politicas de privacidad: '.$request->correo);
        $usuario=new usuarios;
        $usuario->usuario=$request->usuario;
        $usuario->correo=$request->correo;
        $usuario->contraseña=$request->contraseña;
        $usuario->aceptor=$request->politica;
        $usuario->save();
        Log::info('Creo un usuario: '.$request->usuario);
    }

}
