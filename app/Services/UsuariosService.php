<?php

namespace App\Services;

use App\Models\Usuarios;
use Exception;

class UsuariosService
{
    public function index()
    {
        try {
            $usuarios = Usuarios::all();
            return response()->json($usuarios, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Usuarios::create($request);
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
            $usuario = Usuarios::findOrFail($id);
            return response()->json($usuario, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar o usuário: " . $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Usuarios::updateOrCreate(["id" => $id], $request);
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
            Usuarios::destroy($id);
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