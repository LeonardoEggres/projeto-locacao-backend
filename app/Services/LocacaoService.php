<?php

namespace App\Services;

use App\Models\Locacao;
use App\Models\LocacaoItem;
use Exception;

class LocacaoService
{
    public function index()
    {
        try {
            return Locacao::with(['itens.brinquedo', 'cliente'])->get();
        } catch (Exception $e) {
            return "Ocorreu um erro ao retornar os dados: " . $e->getMessage();
        }
    }
    
    public function store($request)
    {
        try {
            $locacao = Locacao::create([
                'codigo' => $request->codigo,
                'data_atual' => $request->data_atual,
                'valor_total' => $request->valor_total,
                'data_devolucao' => $request->data_devolucao,
                'cliente_id' => $request->cliente_id,
            ]);

            foreach ($request->itens as $item) {
                LocacaoItem::create([
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $item['valor_unitario'],
                    'valor_total_item' => $item['valor_total_item'],
                    'locacao_id' => $locacao->id,
                    'brinquedo_id' => $item['brinquedo_id'],
                ]);
            }

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Locacao::with(['itens.brinquedo', 'cliente'])->findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a Locação: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Locacao::updateOrCreate(
                [ "id" => $id ],
                [
                    "codigo" => $request->codigo,
                    "data_atual" => $request->data_atual,
                    "valor_total" => $request->valor_total,
                    "data_devolucao" => $request->data_devolucao,
                    "cliente_id" => $request->cliente_id,
                ]);

            foreach ($request->itens as $item) 
            {
                $idItem = $item['id'] ?? null;
                LocacaoItem::updateOrCreate(
                    ['id' => $idItem],
                    [
                        'locacao_id' => $id,
                        'brinquedo_id' => $item['brinquedo_id'],
                        'quantidade' => $item['quantidade'],
                        'valor_unitario' => $item['valor_unitario'],
                        'valor_total_item' => $item['valor_total_item'],
                    ]
                );
            }
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $locacao = Locacao::findOrFail($id);
            $locacao->itens()->delete();
            $locacao->delete();
            
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}