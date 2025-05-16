<?php

namespace App\Services;

use App\Models\Brinquedo;
use App\Models\Locacao;
use App\Models\LocacaoItem;
use Exception;

class LocacaoService
{
    public function index()
    {
        try {
            $locacao = Locacao::all();
            return response()->json($locacao, 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao retornar os dados: " . $e->getMessage()
            ], 500); 
        }
    }
    
    public function store($request)
    {
        try {            
            $locacao = Locacao::create([
                'codigo' => $request['codigo'],
                'data_atual' => $request['data_atual'],
                'valor_total' => $request['valor_total'],
                'data_devolucao' => $request['data_devolucao'],
                'cliente_id' => $request['cliente_id'],
            ]);
            foreach ($request['items'] as $item) {
                LocacaoItem::create([
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $item['valor_unitario'],
                    'valor_total_item' => $item['valor_unitario'] * $item['quantidade'],
                    'locacao_id' => $locacao->id,
                    'brinquedo_id' => $item['brinquedo_id'],
                ]);
            }

            return response()->json([
                "message" => "Cadastrado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao inserir:" . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $locacao = Locacao::with(['cliente', 'items'])
            ->findOrFail($id);
            
            return response()->json([
                'codigo'         => $locacao->codigo,
                'data_atual'     => $locacao->data_atual,
                'valor_total'    => $locacao->valor_total,
                'data_devolucao' => $locacao->data_devolucao,
                'cliente_id'     => $locacao->cliente_id,
                'items'          => $locacao->items->map(function ($item) {
                    return [
                        'quantidade'        => $item->quantidade,
                        'valor_unitario'    => $item->valor_unitario,
                        'valor_total_item'  => $item->valor_total_item,
                        'brinquedo_id'      => [
                            "id" => $item->brinquedo_id,
                            "nome" => Brinquedo::where('id', $item->brinquedo_id)->pluck('nome')
                        ]
                    ];
                })
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao buscar a Locação: ". $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            Locacao::updateOrCreate(
                [ "id" => $id ],
                [
                    "codigo" => $request['codigo'],
                    "data_atual" => $request['data_atual'],
                    "valor_total" => $request['valor_total'],
                    "data_devolucao" => $request['data_devolucao'],
                    "cliente_id" => $request['cliente_id'],
                ]);

            foreach ($request['items'] as $item) 
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
            
            return response()->json([
                "message" => "Alterado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Erro ao alterar:" . $e->getMessage()
            ], 500);
        }
    }

    public function destroyItem($id)
    {
        try {
            LocacaoItem::destroy($id);
            return response()->json([
                "message" => "Item da locação excluído com sucesso!"
            ], 200); 
        } catch (Exception $e) {
            return response()->json([
                "error" => "Ocorreu um erro ao deletar o item: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $locacao = Locacao::findOrFail($id);
            $locacao->items()->delete();
            $locacao->delete();
            
            return response()->json([
                "message" => "Excluído com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Erro ao deletar: ' . $e->getMessage()
            ], 500);
        }
    }
}