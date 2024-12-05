<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ServicioAsignadoController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\AuthController;



Route::apiResource('clientes', ClienteController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('servicios', ServicioController::class);
Route::apiResource('asignaciones', ServicioAsignadoController::class);
Route::resource('recordatorios', RecordatorioController::class);

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
