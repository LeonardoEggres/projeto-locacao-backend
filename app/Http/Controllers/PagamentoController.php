<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentoRequest;
use App\Services\PagamentoService;

class PagamentoController extends Controller
{
    public function index(PagamentoService $pagamentoService)
    {
        return $pagamentoService->index();
    }

    public function store(PagamentoRequest $request, PagamentoService $pagamentoService)
    {
        return $pagamentoService->store($request->validated());
    }

    public function show(string $id, PagamentoService $pagamentoService)
    {
        return $pagamentoService->show($id);
    }

    public function update(PagamentoRequest $request, string $id, PagamentoService $pagamentoService)
    {
        return $pagamentoService->update($request->validated(), $id);
    }

    public function destroy(string $id, PagamentoService $pagamentoService)
    {
        return $pagamentoService->destroy($id);
    }
}