<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke(){
        if(session()->has("nome_usuario")){
            return redirect()->route("buscar.contatos");
        }else{
            return redirect()->route("buscar.contatos");
        }
    }
}
