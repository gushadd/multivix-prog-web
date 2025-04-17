<?php

namespace App\Http\Requests\Produtos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'nome' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
                Rule::unique('produtos', 'nome')->ignore($this->route('produto')),
            ],  
            'descricao' => 'nullable|string|min:3|max:500',
            'valor' => 'nullable|decimal:2|min:0.01|max:99999999.99',
            'categoria' => 'nullable|string|min:3|max:255',
            'foto' => 'nullable|string',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string'   => 'O nome deve ser um texto válido.',
            'nome.min'      => 'O nome deve ter no mínimo :min caracteres.',
            'nome.max'      => 'O nome deve ter no máximo :max caracteres.',
            'nome.unique'   => 'Já existe um produto cadastrado com este nome.',
    
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.string'   => 'A descrição deve ser um texto válido.',
            'descricao.min'      => 'A descrição deve ter no mínimo :min caracteres.',
            'descricao.max'      => 'A descrição deve ter no máximo :max caracteres.',
    
            'valor.required' => 'O valor é obrigatório.',
            'valor.decimal'  => 'O valor deve ter duas casas decimais.',
            'valor.min'      => 'O valor mínimo permitido é R$ 0,01.',
            'valor.max'      => 'O valor máximo permitido é R$ 99.999.999,99.',
    
            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.string'   => 'A categoria deve ser um texto válido.',
            'categoria.min'      => 'A categoria deve ter no mínimo :min caracteres.',
            'categoria.max'      => 'A categoria deve ter no máximo :max caracteres.',
    
            'foto.string' => 'A foto deve ser uma URL ou caminho de imagem válido.',
        ];
    }
    
}
