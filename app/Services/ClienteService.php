<?php

namespace App\Services;

use App\Models\Cliente;
use Exception;

class ClienteService
{
    public function index()
    {
        return Cliente::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'cpf' => 'required | string',
                'data_nascimento' => 'required | date',
                'endereco' => 'required | string',
                'telefone' => 'required | string'
            ]);
            Cliente::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id){
        try{
            return json_encode(Cliente::findOrFail($id));
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Cliente: ". $e->getMessage();
        }
    }

    public function update($request, $id){
        try {
            Cliente::updateOrCreate([
                "id" => $id,
            ], 
            [
                "nome"=> $request->nome,
                "cpf"=> $request->cpf,
                "data_nascimento"=> $request->data_nascimento,
                "endereco"=> $request->endereco,
                "telefone"=> $request->telefone,
            ]);

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar". $e->getMessage();
        }
    }

    public function destroy($id){
        try {
            Cliente::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}