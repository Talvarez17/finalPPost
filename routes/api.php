<?php

use App\Http\Controllers\Api\TareasController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('tareas')->group(function () {
    Route::get('/getAll', [TareasController::class, 'getTareas']);
    Route::get('/getOne/{idTarea}', [TareasController::class, 'getTareaById'])->where('idTarea', '[0-9]+');
    Route::post('/insert', [TareasController::class, 'insertTarea']);
    Route::post('/update', [TareasController::class, 'updateTarea']);
    Route::get('/delete/{idTarea}', [TareasController::class, 'deleteTarea'])->where('idTarea', '[0-9]+');
});


Route::prefix('user')->group(function () {
    Route::get('/getAll', [UserController::class, 'getRegistros']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/getOne/{idUser}', [UserController::class, 'getUserById'])->where('idUser', '[0-9]+');
    Route::post('/insert', [UserController::class, 'register']);
    Route::put('/update/{idUser}', [UserController::class, 'updateUser'])->where('idUser', '[0-9]+');
    Route::delete('/delete/{idUser}', [UserController::class, 'deleteUser'])->where('idUser', '[0-9]+');
    Route::post('/passs', [UserController::class, 'encriptar']);

});
