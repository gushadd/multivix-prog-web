<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;

// Rotas públicas da API
Route::post('/login', [AuthController::class, 'login']);
Route::post('/usuarios', [UsuarioController::class, 'store']); // Cadastro público

Route::middleware('auth:sanctum')->group(function () {
    // Autenticação
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('usuarios', UsuarioController::class)->except(['store']);
    Route::apiResource('produtos', ProdutoController::class);
});
