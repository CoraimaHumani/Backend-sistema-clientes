<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ServicioAsignadoController;
use App\Http\Controllers\RecordatorioController;

Route::apiResource('clientes', ClienteController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('servicios', ServicioController::class);
Route::apiResource('asignaciones', ServicioAsignadoController::class);
Route::resource('recordatorios', RecordatorioController::class);



/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
