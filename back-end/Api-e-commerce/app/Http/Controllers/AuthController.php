<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = user::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $usuario->tokens()->delete();
        $token = $usuario->createToken('token-login')->plainTextToken;

        return response()->json([
            'message' => 'Login bem-sucedido!',
            'token' => $token,
            'usuario' => $usuario
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $token = $user->currentAccessToken();
        $token->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso.'
        ]);
    }


    // Função de registro
    public function register(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed', // A senha precisa ser confirmada
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Criação do novo usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Criptografando a senha
        ]);

        // Autenticação do usuário após registro
        Auth::login($user);

        return response()->json([
            'message' => 'Registro realizado com sucesso.',
            'user' => $user,
        ], 201);
    }
}
