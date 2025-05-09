<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocacaoService;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LocacaoService $locacaoService)
    {
        return $locacaoService->index(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, LocacaoService $locacaoService)
    {
        return $locacaoService->store($request); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, LocacaoService $locacaoService)
    {
        return $locacaoService->update($request, $id); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $locacaoService->destroy($id); 
    }
}
