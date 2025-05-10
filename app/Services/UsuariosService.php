<?php

namespace App\Services;

use App\Models\Usuarios;
use Exception;

class UsuariosService
{
    public function index()
    {
        return Usuarios::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'telefone' => 'required | string',
                'cpf' => 'required | string',
                'papel_id' => 'required | exists:papeis,id'
            ]);
            Usuarios::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return json_encode(Usuarios::findOrFail($id));
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o usuário: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Usuarios::updateOrCreate(
                [
                    "id" => $id,
                ],
                [
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'cpf' => $request->cpf,
                    'papel_id' => $request->papel_id,
                ]
            );

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Usuarios::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}