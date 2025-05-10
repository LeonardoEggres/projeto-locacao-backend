<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Services\BrinquedoService;
use App\Services\MarcaService;
use Exception;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MarcaService $marcaService)
    {
        return $marcaService->index(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarcaRequest $request, MarcaService $marcaService)
    {
        try {
            $marca = $marcaService->store($request->validated());
            return response()->json([
                'message' => 'Marca criada com sucesso!',
                'data' => $marca
            ], 201);
        } catch (Exception $e){
            return response()->json([
                'message' => 'Erro ao criar a marca.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarcaRequest $request, string $id, MarcaService $marcaService)
    {
        return $marcaService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, MarcaService $marcaService)
    {
        return $marcaService->destroy($id);
    }
}
