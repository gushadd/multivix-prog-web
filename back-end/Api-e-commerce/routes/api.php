<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('usuarios', UsuarioController::class);