<?php

namespace App\Services;
use Exception;
use Illuminate\Http\Request;
use App\Models\Brinquedo;

class BrinquedoService
{
    public function index()
    {
        return Brinquedo::all();
    }

    public function store($request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required | string',
                'codigo' => 'required | numeric',
                'valor_locacao' => 'required | numeric',
                'data_aquisicao' => 'required | date',
            ]);
            Brinquedo::create($data);
        } catch (Exception $e) {
             return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function update($request,$id){
        try{
            Brinquedo::updateOrCreate([
                "id" => $id,
            ],
            [
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'valor_locacao' => $request->valor_locacao,
                'data_aquisicao' => $request->data_aquisicao,
            ]);
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id){
        try{
            Brinquedo::destroy($id);
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}