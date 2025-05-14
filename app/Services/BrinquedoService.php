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
                'marca_id' => 'required | exists:marcas,id',
                'tipo_brinquedo_id' => 'required | exists:tipo_brinquedo,id'
            ]);
            Brinquedo::create($data);

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return Brinquedo::findOrFail($id);
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Brinquedo: " . $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            Brinquedo::updateOrCreate(
                [
                    "id" => $id,
                ],
                [
                    'nome' => $request->nome,
                    'codigo' => $request->codigo,
                    'valor_locacao' => $request->valor_locacao,
                    'data_aquisicao' => $request->data_aquisicao,
                    'marca_id' => $request->marca_id,
                    'tipo_brinquedo_id' => $request->tipo_brinquedo_id
                ]
            );

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Brinquedo::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }

    public function filter(Request $request)
    {
        return Brinquedo::where(
            'nome',
            'like',
            '%' . $request->nome . '%'
            )->select(
                'nome',
                'codigo'
            )->orderBy(
                'nome',
                'asc'
            )->limit(
                10
            )->get();
    }
}