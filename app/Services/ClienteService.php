<?php

namespace App\Services;

use App\Models\Cliente;
use Exception;

class ClienteService
{
    public function index()
    {
        try {
            $cliente = Cliente::all();
            return response()->json($cliente, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Cliente::create($request);
            return response()->json([
                "message" => "Cadastrado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao inserir:" . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            return response()->json($cliente, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar o Cliente: " . $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Cliente::updateOrCreate(["id" => $id], $request);
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
            Cliente::destroy($id);
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
