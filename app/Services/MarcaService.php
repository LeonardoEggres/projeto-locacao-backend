<?php

namespace App\Services;

use App\Models\Marca;
use Exception;

class MarcaService
{
    public function index()
    {
        return Marca::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'codigo' => 'required | numeric',
            ]);
            Marca::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return json_encode(Marca::findOrFail($id));
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a marca: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Marca::updateOrCreate([
                "id" => $id,
            ],
            [
                'nome' => $request->nome,
                'codigo' => $request->codigo,
            ]);
        
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id) {
        try {
            Marca::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}