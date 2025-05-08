<?php

namespace App\Services;

use App\Models\Papeis;
use Exception;

class PapeisService
{
    public function index()
    {
        return Papeis::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'codigo' => 'required | numeric'
            ]);
            Papeis::create($data);
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Papeis::updateOrCreate(
                [
                    "id" => $id
                ],
                [
                    'nome' => $request->nome,
                    'codigo' => $request->codigo,
                ]
            );
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id){
        try{
            Papeis::destroy($id);
        } catch (Exception $e) {
            return "Erro ao deletar". $e->getMessage();
        }
    }
}