<?php

namespace App\Services;

use App\Models\Marca;
use Exception;

class MarcaService
{
    public function index()
    {
        try {
            $marca = Marca::all();
            return response()->json($marca, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Marca::create($request);
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
            $marca = Marca::findOrFail($id);
            return response()->json($marca, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar a marca: ". $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Marca::updateOrCreate(["id" => $id], $request);
            return response()->json([
                "message" => "Alterado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao alterar:" . $e->getMessage()
            ], 500); 
        }
    }

    public function destroy($id)
    {
        try {
            Marca::destroy($id);
            return response()->json([
                "message" => "Excluído com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao deletar:" . $e->getMessage()
            ], 500);
        }
    }
}