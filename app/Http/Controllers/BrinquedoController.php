<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrinquedoRequest;
use App\Models\Brinquedo;
use Illuminate\Http\Request;
use App\Services\BrinquedoService;

class BrinquedoController extends Controller
{
    public function index(BrinquedoService $BrinquedoService)
    {
        return $BrinquedoService->index();
    }

    public function store(BrinquedoRequest $request, BrinquedoService $BrinquedoService)
    {
        return $BrinquedoService->store($request->validated());   
    }

    public function show(string $id, BrinquedoService $BrinquedoService)
    {
        return $BrinquedoService->show($id);
    }

    public function update(BrinquedoRequest $request, string $id, BrinquedoService $BrinquedoService)
    {
        return $BrinquedoService->update($request->validated(), $id);
    }

    public function destroy(string $id, BrinquedoService $BrinquedoService)
    {
        return $BrinquedoService->destroy($id);
    }

    public function filter(Request $request, BrinquedoService $BrinquedoService)
    {
        return $BrinquedoService->filter($request);    
    }
}