<?php

namespace App\Services;
use App\Http\Requests\BrinquedoRequest;
use Exception;
use App\Models\Brinquedo;
use Illuminate\Database\Eloquent\Collection;

class BrinquedoService
{
    public function index(): Collection
    {
        return Brinquedo::all();
    }

    public function store(BrinquedoRequest $request): string
    {
        try {
            Brinquedo::create($request->validated());

            return "Cadastrado com sucesso!";
        } catch (Exception $e) {
             return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id){
        try{
            return json_encode(Brinquedo::findOrFail($id));
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar o Brinquedo: ". $e->getMessage();
        }
    }

    public function update($request, $id)
    {
        try{
            Brinquedo::updateOrCreate([ "id" => $id ], $request);

            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id): string
    {
        try{
            Brinquedo::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}