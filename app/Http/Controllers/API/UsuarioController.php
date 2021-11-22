<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{
    public function salvar(Request $request){
        if(UsuarioModel::cadastrar($request)) {
           return response("cadastrado", 200);
        } else{
            return response("erro", 409);
        }

    }
}
