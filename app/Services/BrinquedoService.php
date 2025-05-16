<?php

namespace App\Services;

use Exception;
use App\Models\Brinquedo;
use Illuminate\Http\Request;

class BrinquedoService
{
    public function index()
    {
        try {
            $brinquedo = Brinquedo::all();
            return response()->json($brinquedo, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Brinquedo::create($request);
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
            $brinquedo = Brinquedo::findOrFail($id);
            return response()->json($brinquedo, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar o Brinquedo: " . $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Brinquedo::updateOrCreate(["id" => $id], $request);
            return response()->json([
                "message" => "Alterado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao alterar:" . $e->getMessage()
            ], 500);
        }
    }

    public function filter(Request $request)
    {
        $brinquedo = Brinquedo::where('nome','like','%' . $request->nome . '%')
        ->select(
            'id',
            'codigo',
            'nome',
            'valor_locacao'
        )->orderBy('nome','asc')
        ->limit(10)
        ->get();

        return response()->json($brinquedo, 200);
    }

    public function destroy($id)
    {
        try {
            Brinquedo::destroy($id);
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
