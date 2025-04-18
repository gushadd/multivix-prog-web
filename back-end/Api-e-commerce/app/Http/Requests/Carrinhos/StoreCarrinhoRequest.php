<?php

namespace App\Http\Requests\Carrinhos;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarrinhoRequest extends FormRequest
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
            'produto_id' => 'required|integer|exists:produtos,id',
        ];
    }
    public function messages()
    {
        return [
            'produto_id.required' => 'O campo do produto é obrigatório.',
            'produto_id.integer'  => 'O campo do produto deve ser um número inteiro válido.',
            'produto_id.exists'   => 'O produto selecionado não existe.',
        ];
    }
}
