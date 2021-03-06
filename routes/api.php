<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Iluminate\Models\UsuarioModel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::get('lista', function(){
        return UsuarioModel::listar(10);
    });

    Route::post('cadastrar', "API\UsuarioController@salvar");
    
});