<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class controladorusuario extends Controller
{
    public function usuario(){
        return view ('login');
    }
    public function validacap(Request $request){
        //return $request;
        $this->validate($request,[
            'username'=>'required|alpha',
            'contraseña'=>'required|alpha',
            'g-recaptcha-response'=>'required|captcha',
        ]);

    }

}
