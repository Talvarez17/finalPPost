<?php

use App\Http\Controllers\Api\TareasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('tareas')->group(function () {
    Route::get('/getAll', [TareasController::class, 'getTareas']);
    Route::get('/getOne/{idTarea}', [TareasController::class, 'getTareaById'])->where('idTarea', '[0-9]+');
    Route::post('/insert', [TareasController::class, 'insertTarea']);
    Route::put('/update/{idTarea}', [TareasController::class, 'updateTarea'])->where('idTarea', '[0-9]+');
    Route::delete('/delete/{idTarea}', [TareasController::class, 'deleteTarea'])->where('idTarea', '[0-9]+');
});
