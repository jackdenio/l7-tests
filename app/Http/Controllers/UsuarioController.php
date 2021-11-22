<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{
    public function cadastrar()
    {
        return view('usuario.cadastro');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            "nome" => "required",
            "email" => "required|email|unique:usuarios,email",
            "senha" => "required|min:5",

        ]);

        if(UsuarioModel::cadastrar($request)) {
            return view('usuario.sucesso', [
                "persona" => $request->input('nome')
            ]);

        }else {
            echo "Falha";
        }

    }
}
