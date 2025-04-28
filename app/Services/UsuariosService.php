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
        try{
            $data = $request->validate([
                'nome' => 'required | string',
                'telefone' => 'required | string',
                'cpf' => 'required | string'
            ]);
            Usuarios::create($data);
        } catch(Exception $e){
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try{
            Usuarios::updateOrCreate([
                'id' => $id,
            ],
            [
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'cpf' => $request->cpf,
            ]);
        }catch(Exception $e){
            return 'Erro ao alterar'. $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Usuarios::destroy($id);
        } catch(Exception $e){
            return 'Erro ao deletar'. $e->getMessage();
        }
    }
}