<?php

namespace App\Http\Controllers;

use App\Services\BrinquedoService;
use App\Services\MarcaService;
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
    public function store(Request $request, MarcaService $marcaService)
    {
        $marcaService->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, MarcaService $marcaService)
    {
        $marcaService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, MarcaService $marcaService)
    {
        $marcaService->destroy($id);
    }
}
