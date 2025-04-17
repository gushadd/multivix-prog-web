<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método de registro (cadastrar usuário)
    public function register(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Gerar o token
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    // Método de login (gerar token)
    public function login(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        // Verifica se o usuário existe
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciais inválidas.'], 401);
        }

        // Gerar o token
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Login bem-sucedido!',
            'user' => $user,
            'token' => $token
        ]);
    }

    // Método de logout (revogar token)
    public function logout(Request $request)
    {
        // Revoga o token do usuário atual
        $user = Auth::user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout bem-sucedido!']);
    }
}
