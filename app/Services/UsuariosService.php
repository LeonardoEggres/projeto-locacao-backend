<?php

namespace App\Services;

use App\Models\Usuarios;

class UsuariosService
{
    public function index()
    {
        return Usuarios::all();
    }

    public function create()
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'telefone' => 'required | string',
                'cpf' => 'required | string',
            ]);
            Usuarios::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
             return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            Usuarios::updateOrCreate([
                "id" => $id,
            ],
            [
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'cpf' => $request->cpf,
            ]);

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            Usuarios::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}