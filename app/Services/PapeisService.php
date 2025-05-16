<?php

namespace App\Services;

use App\Models\Papeis;
use Exception;

class PapeisService
{
    public function index()
    {
        try {
            $papeis = Papeis::all();
            return response()->json($papeis, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Papeis::create($request);
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
            $papel = Papeis::findOrFail($id);
            return response()->json($papel, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar o Papel: " . $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Papeis::updateOrCreate(["id" => $id], $request);
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
            Papeis::destroy($id);
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