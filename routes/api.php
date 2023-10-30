<?php

use App\Http\Controllers\Api\TiendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('user-profile', [UserController::class, 'userprofile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('all', [TiendaController::class, 'index']);
    Route::post('create', [TiendaController::class, 'create']);
    Route::get('getBy/{id}', [TiendaController::class, 'index_id']);
    Route::put('update/{id}', [TiendaController::class, 'update']);
    Route::delete('delete/{id}', [TiendaController::class, 'delete']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

