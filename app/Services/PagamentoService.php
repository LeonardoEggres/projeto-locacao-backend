<?php

namespace App\Services;

use App\Models\Pagamento;
use Exception;

class PagamentoService
{
    public function index()
    {
        try {
            $pagamentos = Pagamento::all();
            return response()->json($pagamentos, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Pagamento::create($request);
            return response()->json([
                "message" => "Cadastrado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao inserir: " . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $pagamento = Pagamento::findOrFail($id);
            return response()->json($pagamento, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar o Papel: " . $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Pagamento::updateOrCreate(["id" => $id], $request);
            return response()->json([
                "message" => "Alterado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao alterar: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            Pagamento::destroy($id);
            return response()->json([
                "message" => "Excluído com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao deletar: " . $e->getMessage()
            ], 500);
        }
    }
}
