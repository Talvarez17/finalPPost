<?php

use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\TiendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CityController;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('obtenerActores/{pagina}/{limite}',[ActorController::class,'getJson'])->where("pagina",'[0-9]+'); //La parte del where nos ayuda a restringir los datos de entrada

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('user-profile', [UserController::class, 'userprofile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('all', [TiendaController::class, 'index']);
    Route::post('create', [TiendaController::class, 'create']);
    Route::get('getBy/{id}', [TiendaController::class, 'index_id']);
    Route::put('update/{id}', [TiendaController::class, 'update']);
    Route::delete('delete/{id}', [TiendaController::class, 'delete']);
    
    Route::prefix('city')->controller(CityController::class)->group(function () {
        Route::get('/all','indexCity');
        Route::post('', 'createCity');
        Route::get('/{id}','index_idCity');
        Route::put('/{id}', 'updateCity');
        Route::delete('/{id}', 'deleteCity');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

