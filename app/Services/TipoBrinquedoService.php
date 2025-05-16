<?php

namespace App\Services;

use App\Models\TipoBrinquedo;
use Exception;

class TipoBrinquedoService
{
    public function index()
    {
        try {
            $tipos = TipoBrinquedo::all();
            return response()->json($tipos, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }
    
    public function store($request)
    {
        try {
            TipoBrinquedo::create($request);
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
            $tipo = TipoBrinquedo::findOrFail($id);
            return response()->json($tipo, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro buscar o Tipo de Brinquedo: " . $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            TipoBrinquedo::updateOrCreate(["id" => $id], $request);
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
            TipoBrinquedo::destroy($id);
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