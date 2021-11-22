<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Hash;
use DB;

class UsuarioModel extends Model
{
    protected $connection = 'sqlite';
    protected $table = 'usuarios';

    public static function listar(int $limite){
        $sql = self::select([
            "id",
            "nome",
            "email",
            "senha",
            "data_cadastro"
        ])
        ->limit($limite);

        return $sql->get();
    }

    public static function cadastrar(Request $request){
        return self::insert([
            "nome" => $request->input('nome'),
            "email" => $request->input('email'),
            "senha" => Hash::make($request->input('senha')),
            "data_cadastro" => new Carbon(),
        ]);
        
        

    }
}
