<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string|min:3',
            'descricao' => 'sometimes|string|min:10',
            'imagem' => 'sometimes|string',
            'quantidade' => 'sometimes|integer|min:0',
            'valor' => 'sometimes|numeric|min:0.01',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.min' => 'O nome deve ter no mínimo :min caracteres.',
            'descricao.min' => 'A descrição deve ter no mínimo :min caracteres.',
            'imagem.string' => 'A imagem deve ser uma URL válida.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade não pode ser negativa.',
            'valor.numeric' => 'O valor deve ser numérico.',
            'valor.min' => 'O valor deve ser maior que zero.',
        ];
    }
}
