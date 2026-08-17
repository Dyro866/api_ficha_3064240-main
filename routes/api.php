<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Rutas API - 5 Entidades
|--------------------------------------------------------------------------
*/

Route::apiResource('roles', RolController::class);
Route::apiResource('zonas', ZonaController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('empleados', EmpleadoController::class);
Route::apiResource('usuarios', UsuarioController::class);