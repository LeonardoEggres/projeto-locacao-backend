<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data_atual' => 'required|date|date_format:Y-m-d',
            'valor_unitario' => 'required|numeric|min:0.01',
            'valor_total' => 'required|numeric|min:0.01',
            'data_devolucao' => 'required|date|date_format:Y-m-d',
            'cpf' => 'required|string',
            'brinquedo_id' => 'required|exists:brinquedos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'data_atual.required' => 'A data atual é obrigatória.',
            'data_atual.date' => 'A data atual deve ser uma data válida.',
            'data_atual.date_format' => 'A data atual deve estar no formato correto (YYYY-MM-DD).',

            'valor_unitario.required' => 'O valor unitário é obrigatório.',
            'valor_unitario.numeric' => 'O valor unitário deve ser um número.',
            'valor_unitario.min' => 'O valor unitário deve ser maior que 0.',

            'valor_total.required' => 'O valor total é obrigatório.',
            'valor_total.numeric' => 'O valor total deve ser um número.',
            'valor_total.min' => 'O valor total deve ser maior que 0.',

            'data_devolucao.required' => 'A data de devolução é obrigatória.',
            'data_devolucao.date' => 'A data de devolução deve ser uma data válida.',
            'data_devolucao.date_format' => 'A data de devolução deve estar no formato correto (YYYY-MM-DD).',
            
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.string' => 'O CPF deve ser uma string.',

            'brinquedo_id.required' => 'O brinquedo é obrigatório.',
            'brinquedo_id.exists' => 'O brinquedo selecionado não existe'
        ];
    }
}
