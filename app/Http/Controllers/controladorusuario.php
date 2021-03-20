<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
        //return $request;
        $this->validate($request,[
            'username'=>'required|alpha',
            'contraseña'=>'required|alpha',
            'g-recaptcha'=>'required|captcha',
        ]);

    }
    public function guardausua(Request $request){
        $this->validate($request,[
            'username'=>'required|alpha',
            'contraseña'=>'required|alpha',
            'correo'=>'required|alpha',
            'g-recaptcha'=>'required|captcha',
            'aceptar'=>'required'
        ]);
        
        $usuario=new usuarios;
        $usuario->usuario=$request->usuario;
        $usuario->correo=$request->correo;
        $usuario->contraseña=$request->contraseña;
        $usuario->politica=$request->politica;
        $usuario->save();
    }

}
