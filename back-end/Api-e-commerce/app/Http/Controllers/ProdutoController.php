<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use Illuminate\Http\JsonResponse;

class ProdutoController extends Controller
{
    public function index(): JsonResponse
    {
        $produtos = Produto::all();
        return response()->json($produtos, 200);
    }

    public function store(StoreProdutoRequest $request): JsonResponse
    {
        $produto = Produto::create($request->validated());
        return response()->json([
            'message' => 'Produto criado com sucesso.',
            'data' => $produto,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        return response()->json($produto, 200);
    }

    public function update(UpdateProdutoRequest $request, int $id): JsonResponse
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        $produto->update($request->validated());

        return response()->json([
            'message' => 'Produto atualizado com sucesso.',
            'data' => $produto,
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto não encontrado.'
            ], 404);
        }

        $produto->delete();

        return response()->json([
            'message' => 'Produto excluído com sucesso.'
        ], 200);
    }
}
