<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
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
            'nome' => 'string|min:3|max:255',
            'email' => 'email|unique:usuarios,email',
            'password' => 'min:6',
            'data_nascimento' => ['date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
        ];
    }

    public function messages()
    {
        return [
            'data_nascimento.date' => 'A data de nascimento precisa ser uma data válida.',
            'data_nascimento.before_or_equal' => 'Você precisa ter pelo menos 18 anos de idade.',

            'nome.string' => 'O nome precisa ser uma string.',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O nome pode ter no máximo 255 caracteres.',

            'email.email' => 'O email fornecido não é válido.',
            'email.unique' => 'Já existe um usuário registrado com este email.',

            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
        ];
    }
}
