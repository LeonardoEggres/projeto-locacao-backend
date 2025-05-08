<?php

namespace App\Services;

use App\Models\Permissao;
use Exception;

class PermissaoService
{
    public function index()
    {
        return Permissao::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'codigo' => 'required | numeric',
            ]);
            Permissao::create($data);
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            Permissao::updateOrCreate([
                "id"=> $id,
            ],[
                'nome' => 'required | string',
                'codigo' => 'required | numeric',
            ]);
        } catch (Exception $e) {
            return "Erro ao alterar". $e->getMessage();
        }
    }

    public function destroy($id) {
        try {
            Permissao::destroy($id);
        } catch (Exception $e) {
            return "Erro ao deletar". $e->getMessage();
        }
    }
}