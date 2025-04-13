<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{    
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json([
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $dadosValidados = $request->validated();
        $dadosValidados['password'] = bcrypt($dadosValidados['password']);

        $usuario = Usuario::create($dadosValidados);

        return response()->json([
            'message' => 'Usuário criado com sucesso!',
            'usuario' => [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'data_nascimento' => $usuario->data_nascimento
            ]
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json([
                'message' => 'Usuário não encontrado.'
            ], 404);
        }
        return response()->json([
            'usuario' => $usuario
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $dadosValidados = $request->validated();

        // Atualiza a senha, se for enviada
        if (isset($dadosValidados['password'])) {
            $dadosValidados['password'] = bcrypt($dadosValidados['password']);
        }
    
        $usuario->update($dadosValidados);
    
        return response()->json([
            'message' => 'Usuário atualizado com sucesso!',
            'usuario' => [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'data_nascimento' => $usuario->data_nascimento
            ]
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'message' => 'Usuário não encontrado.'
            ], 404);
        }
    
        $usuario->delete();
    
        return response()->json([
            'message' => 'Usuário removido com sucesso!'
        ]);
    }

}
