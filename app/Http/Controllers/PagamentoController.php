<?php

namespace App\Http\Controllers;

use App\Services\PagamentoService;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PagamentoService $pagamentoService)
    {
        return $pagamentoService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PagamentoService $pagamentoService)
    {
        return $pagamentoService->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, PagamentoService $pagamentoService)
    {
        return $pagamentoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, PagamentoService $pagamentoService)
    {
        return $pagamentoService->destroy($id);
    }
}
