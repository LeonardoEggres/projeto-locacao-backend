<?php

namespace App\Services;

use App\Models\Cliente;
use Exception;

class ClienteService
{
    public function index()
    {
        try {
            return Cliente::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Cliente::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Cliente::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Cliente: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Cliente::updateOrCreate([ "id" => $id ], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Cliente::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}