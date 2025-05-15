<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return [
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'data_nascimento' => 'required|date|date_format:Y-m-d',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do cliente é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',

            'cpf.required' => 'O cpf do cliente é obrigatório.',
            'cpf.string' => 'O cpf deve ser um texto.',

            'data_nascimento.required' => 'A data de nascimento do cliente é obrigatória.',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data.',
            'data_nascimento.date_format' => 'A data de nascimento deve estar no formato correto (YYYY-MM-DD).',

            'endereco.required' => 'O endereço do cliente é obrigatório.',
            'endereco.string' => 'O endereço deve ser um texto.',

            'telefone.required' => 'O telefone do cliente é obrigatório.',
            'telefone.string' => 'O telefone deve ser um texto.'
        ];
    }
}
