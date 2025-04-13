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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
            'data_nascimento' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
        ];
    }
}
