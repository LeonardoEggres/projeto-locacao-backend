<?php

namespace App\Services;

use App\Models\Pagamento;
use Exception;

class PagamentoService
{
    public function index()
    {
        try {
            return Pagamento::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Pagamento::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Pagamento::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Papel: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Pagamento::updateOrCreate([ "id" => $id ], $request);
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