<?php

namespace App\Services;
use Exception;
use App\Models\Brinquedo;

class BrinquedoService
{
    public function index()
    {
        try {
            return Brinquedo::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Brinquedo::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Brinquedo::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Brinquedo: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Brinquedo::updateOrCreate([ "id" => $id ], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Brinquedo::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}