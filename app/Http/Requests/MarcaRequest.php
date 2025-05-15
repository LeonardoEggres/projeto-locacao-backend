<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string',
            'codigo' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da marca é obrigatória.',
            'nome.string' => 'O nome deve ser texto.',
            'codigo.required' => 'O código da marca é obrigatória.',
            'codigo.numeric' => 'O código deve ser um número.'
        ];
    }
}
