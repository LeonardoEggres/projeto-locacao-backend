<?php

namespace App\Http\Controllers;

use App\Services\TipoBrinquedoService;
use Illuminate\Http\Request;

class TipoBrinquedoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TipoBrinquedoService $tipoBrinquedoService)
    {
       return $tipoBrinquedoService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->destroy($id);
    }
}
