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
            'codigo' => 'required|integer',
            'data_atual' => 'required|date|date_format:Y-m-d',
            'valor_total' => 'required|numeric|min:0.01',
            'data_devolucao' => 'required|date|date_format:Y-m-d',
            'cliente_id' => 'required|exists:clientes,id',
            'brinquedo_id' => 'required|exists:brinquedos,id',
            'itens' => 'required|array|min:1',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valor_unitario' => 'required|numeric|min:0',
            'itens.*.valor_total_item' => 'required|numeric|min:0',
            'itens.*.brinquedo_id' => 'required|exists:brinquedos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'O código é obrigatório.',
            'codigo.integer' => 'O código deve ser um número.',

            'data_atual.required' => 'A data atual é obrigatória.',
            'data_atual.date' => 'A data atual deve ser uma data válida.',
            'data_atual.date_format' => 'A data atual deve estar no formato correto (YYYY-MM-DD).',

            'valor_total.required' => 'O valor total é obrigatório.',
            'valor_total.numeric' => 'O valor total deve ser um número.',
            'valor_total.min' => 'O valor total deve ser maior que 0.',

            'data_devolucao.required' => 'A data de devolução é obrigatória.',
            'data_devolucao.date' => 'A data de devolução deve ser uma data válida.',
            'data_devolucao.date_format' => 'A data de devolução deve estar no formato correto (YYYY-MM-DD).',
            
            'cliente_id.required' => 'O cliente é obrigatório.',
            'cliente_id.exists' => 'O cliente selecionado não existe.',

            'brinquedo_id.required' => 'O brinquedo é obrigatório.',
            'brinquedo_id.exists' => 'O brinquedo selecionado não existe',
            
            'itens.required' => 'Os itens são obrigatórios.',
            'itens.array' => 'Os itens devem ser um array.',
            'itens.*.quantidade.required' => 'A quantidade é obrigatória para todos os itens.',
            'itens.*.quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'itens.*.valor_unitario.required' => 'O valor unitário é obrigatório para todos os itens.',
            'itens.*.valor_unitario.numeric' => 'O valor unitário deve ser numérico.',
            'itens.*.valor_total_item.required' => 'O valor total do item é obrigatório.',
            'itens.*.valor_total_item.numeric' => 'O valor total do item deve ser numérico.',
            'itens.*.brinquedo_id.required' => 'O brinquedo é obrigatório em todos os itens.',
            'itens.*.brinquedo_id.exists' => 'O brinquedo selecionado não existe em um dos itens.',
        ];
    }
}
