<?php

namespace App\Services;

use App\Models\Permissao;
use Exception;

class PermissaoService
{
    public function index()
    {
        try {
            return Permissao::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Permissao::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Permissao::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a Permissão: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Permissao::updateOrCreate([ "id"=> $id ], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Permissao::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar" . $e->getMessage();
        }
    }
}