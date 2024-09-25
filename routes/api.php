<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrosAtrController;


Route::get('/usuarios', [UserController::class, 'index']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/usuarios/{usuarioId}/registrar-chegada', [RegistrosAtrController::class, 'registrarChegada']);
Route::get('/usuarios/{usuarioId}/chegadas', [RegistrosAtrController::class, 'getChegadas']);

