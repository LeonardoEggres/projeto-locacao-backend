<?php

namespace App\Services;

use App\Models\Locacao;
use Exception;

class LocacaoService
{
    public function index()
    {
        return Locacao::all();
    }
    
    public function store($request)
    {
        try {
            $data = $request->validate([
                'data_atual' => 'required | date',
                'valor_unitario' => 'required | numeric',
                'valor_total' => 'required | numeric',
                'data_devolucao' => 'required | date',
                'cpf' => 'required | string',
                'brinquedo_id' => 'required | exists:brinquedos,id',
            ]);
            Locacao::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id){
        try{
            return Locacao::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a Locação: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Locacao::updateOrCreate([
                "id" => $id,
            ],
            [
                'data_atual' => $request->data_atual,
                'valor_unitario' => $request->valor_unitario,
                'valor_total' => $request->valor_total,
                'data_devolucao' => $request->data_devolucao,
                'cpf' => $request->cpf,
                'brinquedo_id' => $request->brinquedo_id,
            ]);

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Locacao::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}