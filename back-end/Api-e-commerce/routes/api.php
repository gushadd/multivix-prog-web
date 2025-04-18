<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\AuthController;

Route::apiResource('produtos', ProdutoController::class);
// Rotas de produtos
//Route::get('produtos', [ProdutoController::class, 'index']); // Acesso público
Route::get('produtos/{produto}', [ProdutoController::class, 'show']); // Acesso público

Route::middleware('auth:sanctum')->group(function () {
    //Route::get('produtos', [ProdutoController::class, 'index']);
    //Route::post('produtos', [ProdutoController::class, 'store']); // Acesso autenticado
    //Route::put('produtos/{produto}', [ProdutoController::class, 'update']); // Acesso autenticado
    //Route::delete('produtos/{produto}', [ProdutoController::class, 'destroy']); // Acesso autenticado
});

// Rotas de carrinho (todas autenticadas)
Route::prefix('carrinhos')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index']);
    Route::post('/', [CarrinhoController::class, 'store']);
    Route::delete('/{id}', [CarrinhoController::class, 'destroy']);
});

// Rotas de autenticação
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
