<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Http\Requests\Carrinhos\StoreCarrinhoRequest;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{

    public function index()
{
    $user = Auth::user();
    $produtosNoCarrinho = $user->carrinhos()->with('produto')->get();
    return response()->json($produtosNoCarrinho);
}


    public function store(StoreCarrinhoRequest $request)
    {

        $user = Auth::user();
        $produtoId = $request->validated()['produto_id'];
        $novoCarrinho = Carrinho::create([
            'user_id' => $user->id,
            'produto_id' => $produtoId,
        ]);

        return response()->json([
            'mensagem' => 'Produto adicionado ao carrinho com sucesso!',
            'produto' => $novoCarrinho
        ], 201);
    }


    public function destroy($id)
    {
        $user = Auth::user();
        $carrinho = Carrinho::find($id);

        if (!$carrinho) {
            return response()->json(['message' => 'Carrinho não encontrado.'], 404);
        }

        if ($carrinho->user_id != $user->id) {
            return response()->json(['message' => 'Usuário sem permissão.'], 403);
        }
        $carrinho->delete();
        return response()->json(['message' => 'Carrinho destruído com sucesso!']);
    }
}
