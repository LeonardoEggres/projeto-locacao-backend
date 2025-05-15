<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string',
            'telefone' => 'required|string',
            'cpf' => 'required|string',
            'papel_id' => 'required|exists:papeis,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do usuário é obrigatório.',
            'nome.string' => 'O nome deve ser texto.',
            'telefone.required' => 'O telefone do usuário é obrigatório.',
            'telefone.numeric' => 'O telefone deve ser um texto.',
            'cpf.required' => 'O cpf do usuário é obrigatório.',
            'cpf.numeric' => 'O cpf deve ser um texto.',
            'papel_id.required' => 'O papel é obrigatório',
            'papel_id.exists' => 'O papel selecionado não existe'
        ];
    }
}
