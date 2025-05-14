<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Services\MarcaService;

class MarcaController extends Controller
{
    public function index(MarcaService $marcaService)
    {
        return $marcaService->index(); 
    }

    public function store(MarcaRequest $request, MarcaService $marcaService)
    {
        return $marcaService->store($request->validated()); 
    }

    public function show(string $id, MarcaService $marcaService)
    {
        return $marcaService->show($id);
    }

    public function update(MarcaRequest $request, string $id, MarcaService $marcaService)
    {
        return $marcaService->update($request->validated(), $id);
    }

    public function destroy(string $id, MarcaService $marcaService)
    {
        return $marcaService->destroy($id);
    }
}