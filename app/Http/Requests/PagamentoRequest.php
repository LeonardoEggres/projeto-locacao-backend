<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagamentoRequest extends FormRequest
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
            'cpf_cliente' => 'required|string',
            'valor_total_pagamento' => 'required|numeric|min:0.01',
            'valor_locacao' => 'required|numeric|min:0.01',
            'data_pagamento' => 'required|date|date_format:Y-m-d',
            'locacao_id' => 'required|exists:locacao,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do pagamento é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            
            'codigo.required' => 'O código do pagamento é obrigatório.',
            'codigo.numeric' => 'O código deve ser um número.',
            
            'cpf_cliente.required' => 'O CPF do cliente é obrigatório.',
            'cpf_cliente.string' => 'O CPF deve ser um texto.',
            
            'valor_total_pagamento.required' => 'O valor total do pagamento é obrigatório.',
            'valor_total_pagamento.numeric' => 'O valor total do pagamento deve ser um número.',
            'valor_total_pagamento.min' => 'O valor total do pagamento deve ser maior que zero.',
            
            'valor_locacao.required' => 'O valor da locação é obrigatório.',
            'valor_locacao.numeric' => 'O valor da locação deve ser um número.',
            'valor_locacao.min' => 'O valor da locação deve ser maior que zero.',
            
            'data_pagamento.required' => 'A data de pagamento é obrigatória.',
            'data_pagamento.date' => 'A data de pagamento deve ser uma data válida.',
            'data_pagamento.date_format' => 'A data de pagamento deve estar no formato correto (YYYY-MM-DD).',

            'locacao_id.required' => 'A locação é obrigatória.',
            'locacao_id.exists' => 'A locação selecionado não existe',
        ];
    }
}
