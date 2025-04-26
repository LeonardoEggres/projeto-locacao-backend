<?php

namespace App\Services;

use App\Models\TipoBrinquedo;
use FFI\Exception;

class TipoBrinquedoService
{
    public function index()
    {
        return TipoBrinquedo::all();
    }
    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'codigo' => 'required | numeric',
            ]);
            TipoBrinquedo::create($data);
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
        ;
    }

    public function update($request, $id)
    {
        try {
            TipoBrinquedo::updateOrCreate([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
            ]);
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
        ;
    }

    public function destroy($id)
    {
        try {
            TipoBrinquedo::destroy($id);
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
        ;
    }
}