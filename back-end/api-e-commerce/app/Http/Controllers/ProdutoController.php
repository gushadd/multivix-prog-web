<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\Produtos\StoreProdutoRequest;
use App\Http\Requests\Produtos\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::all();
    }

    public function store(StoreProdutoRequest $request)
    {
        $novoProduto = Produto::create($request->validated());
        return response()->json([
            'mensagem' => 'Produto criado com sucesso!',
            'produto' => $novoProduto
        ], 201);
    }

    public function show($id)
    {
        $produto = $this->LocalizarId($id);
        return response()->json($produto);
    }

    public function update(UpdateProdutoRequest $request, $id) {
        $produto = $this->LocalizarId($id);
        $produto->update($request->validated());
        
        return response()->json([
            'mensagem' => 'Produto atualizado com sucesso!',
            'produto' => $produto
        ]);
    }

    public function destroy($id)
    {
        $produto = $this->LocalizarId($id);
        $produto->delete();

        return response()->json(['mensagem' => 'Produto destruído com sucesso!']);
    }

    private function LocalizarId($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            abort(response()->json(['mensagem' => 'Produto não encontrado.'], 404));
        }

        return $produto;
    }
}
