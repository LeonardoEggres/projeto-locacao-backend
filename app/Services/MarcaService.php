<?php

namespace App\Services;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use Exception;

class MarcaService
{
    public function index()
    {
        try {
            return Marca::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Marca::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Marca::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a marca: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Marca::updateOrCreate(["id" => $id], $request);
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Marca::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}