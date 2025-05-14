<?php

namespace App\Services;

use App\Models\TipoBrinquedo;
use Exception;

class TipoBrinquedoService
{
    public function index()
    {
        try {
            return TipoBrinquedo::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }
    
    public function store($request)
    {
        try {
            TipoBrinquedo::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return TipoBrinquedo::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro buscar o Tipo de Brinquedo: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            TipoBrinquedo::updateOrCreate([ "id" => $id ], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            TipoBrinquedo::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}