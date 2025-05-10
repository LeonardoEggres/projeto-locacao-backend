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

    public function update(BrinquedoRequest $request, $id): string
    {
        try{
            Brinquedo::updateOrCreate([
                "id" => $id,
            ],$request->validated());

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