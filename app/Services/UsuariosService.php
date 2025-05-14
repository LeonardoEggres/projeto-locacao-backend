<?php

namespace App\Services;

use App\Models\Usuarios;
use Exception;

class UsuariosService
{
    public function index()
    {
        try {
            return Usuarios::all();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            Usuarios::create($request);
            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Usuarios::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o usuário: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Usuarios::updateOrCreate([ "id" => $id ], $request);
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