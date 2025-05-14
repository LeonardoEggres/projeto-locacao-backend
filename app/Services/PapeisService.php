<?php

namespace App\Services;

use App\Models\Papeis;
use Exception;

class PapeisService
{
    public function index()
    {
        try {
            return Papeis::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Papeis::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Papeis::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Papel: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Papeis::updateOrCreate([ "id" => $id ], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Papeis::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar" . $e->getMessage();
        }
    }
}