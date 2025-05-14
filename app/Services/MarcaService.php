<?php

namespace App\Services;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use Dotenv\Exception\ValidationException;
use Exception;

class MarcaService
{
    public function index()
    {
        return Marca::all();
    }

    public function store($request)
    {
        try {
            Marca::create($request);
            return "Cadastrado com sucesso!";
        } catch (ValidationException $e) {
            return "Erro na validação: ".$e->getMessage();
        } catch (Exception $e) {

            return "Erro ao inserir:" . $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return json_encode(Marca::findOrFail($id));
        } catch (Exception $e) {
            return "Ocorreu um erro ao buscar a marca: ". $e->getMessage();
        }
    }

    public function update(MarcaRequest $request, $id)
    {
        try {
            Marca::updateOrCreate([
                "id" => $id,
            ],$request->validated());
        
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            return "Erro ao alterar:" . $e->getMessage();
        }
    }

    public function destroy($id) {
        try {
            Marca::destroy($id);
            return "Excluído com sucesso!";
        } catch (Exception $e) {
            return "Erro ao deletar:" . $e->getMessage();
        }
    }
}