<?php

namespace App\Services;

use App\Models\Pagamento;
use Exception;

class PagamentoService
{
    public function index()
    {
        return Pagamento::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'codigo' => 'required | numeric',
                'cpf_cliente' => 'required | string',
                'valor_total_pagamento' => 'required | numeric',
                'valor_locacao' => 'required | numeric',
                'data_pagamento' => 'required | date',
                'locacao_id' => 'required | exists:locacao,id'
            ]);
            Pagamento::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return json_encode(Pagamento::findOrFail($id));
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Pagamento: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Pagamento::updateOrCreate(
                [
                    "id" => $id,
                ],
                [
                    'nome' => $request->nome,
                    'codigo' => $request->codigo,
                    'cpf_cliente' => $request->cpf_cliente,
                    'valor_total_pagamento' => $request->valor_total_pagamento,
                    'valor_locacao' => $request->valor_locacao,
                    'data_pagamento' => $request->data_pagamento,
                    'locacao_id' => $request->locacao_id,
                ]
            );

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Pagamento::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}