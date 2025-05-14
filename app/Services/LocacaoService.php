<?php

namespace App\Services;

use App\Models\Locacao;
use Exception;

class LocacaoService
{
    public function index()
    {
        try {
            return Locacao::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }
    
    public function store($request)
    {
        try {
            Locacao::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Locacao::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a Locação: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Locacao::updateOrCreate([ "id" => $id ], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Locacao::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}