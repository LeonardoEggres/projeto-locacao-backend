<?php

namespace App\Http\Controllers;

use App\Models\Brinquedo;
use Illuminate\Http\Request;
use App\Services\BrinquedoService;

class BrinquedoController extends Controller // Corrigido para "Controller"
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrinquedoService $BrinquedoService)
    {
       $brinquedo = $BrinquedoService->index();
       return $brinquedo;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, BrinquedoService $BrinquedoService)
    {
        $BrinquedoService->store($request);   
    }

    /**
     * Display the specified resource.
     */
    public function update(Request $request, string $id, BrinquedoService $BrinquedoService)
    {
        $BrinquedoService->update($request, $id);
    }

    public function destroy(string $id,BrinquedoService $BrinquedoService)
    {
        $BrinquedoService->destroy($id);
    }
}