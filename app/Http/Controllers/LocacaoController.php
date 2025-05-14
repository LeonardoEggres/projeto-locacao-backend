<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocacaoRequest;
use App\Services\LocacaoService;

class LocacaoController extends Controller
{
    public function index(LocacaoService $locacaoService)
    {
        return $locacaoService->index(); 
    }

    public function store(LocacaoRequest $request, LocacaoService $locacaoService)
    {
        return $locacaoService->store($request->validated()); 
    }

    public function show(string $id, LocacaoService $locacaoService)
    {
        return $locacaoService->show($id);
    }

    public function update(LocacaoRequest $request, string $id, LocacaoService $locacaoService)
    {
        return $locacaoService->update($request->validated(), $id); 
    }

    public function destroy(string $id, LocacaoService $locacaoService)
    {
        return $locacaoService->destroy($id); 
    }
}