<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $usuario->tokens()->delete(); //Remove todos os tokens antigos do usuário
        $token = $usuario->createToken('token-login')->plainTextToken;

        return response()->json([
            'message' => 'Login bem-sucedido!',
            'token' => $token,
            'usuario' => $usuario
        ]);
    }

    public function logout(Request $request)
    {
        // Revoga apenas o token atual
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso.'
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'usuario' => $request->user()
        ]);
    }
}
