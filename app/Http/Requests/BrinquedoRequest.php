<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrinquedoRequest extends FormRequest
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
            'valor_locacao' => 'required|numeric',
            'data_aquisicao' => 'required|date',
            'marca_id' => 'required|exists:marcas,id',
            'tipo_brinquedo_id' => 'required|exists:tipo_brinquedo,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do brinquedo é obrigatório.',
            'nome.string' => 'O nome deve ser texto.',
            'codigo.required' => 'O código do brinquedo é obrigatório.',
            'codigo.numeric' => 'O código deve ser um número.',
            'valor_locacao.required' => 'O valor da locação é obrigatório.',
            'valor_locacao.numeric' => 'O valor da locação deve ser um número.',
            'data_aquisicao.required' => 'A data de aquisição é obrigatória.',
            'data_aquisicao.date' => 'A data de aquisição deve ser uma data.',
            'marca_id.required' => 'A marca é obrigatória.',
            'marca_id.exists' => 'Marca inválida.',
            'tipo_brinquedo_id.required' => 'Tipo de brinquedo é obrigatório.',
            'tipo_brinquedo_id.exists' => 'Tipo de brinquedo inválido.',
        ];
    }
}
