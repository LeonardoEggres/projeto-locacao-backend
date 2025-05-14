<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoBrinquedoRequest;
use App\Services\TipoBrinquedoService;

class TipoBrinquedoController extends Controller
{
    public function index(TipoBrinquedoService $tipoBrinquedoService)
    {
       return $tipoBrinquedoService->index();
    }

    public function store(TipoBrinquedoRequest $request, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->store($request->validated());
    }

    public function show(string $id, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->show($id);
    }

    public function update(TipoBrinquedoRequest $request, string $id, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->update($request->validated(), $id);
    }

    public function destroy(string $id, TipoBrinquedoService $tipoBrinquedoService)
    {
        return $tipoBrinquedoService->destroy($id);
    }
}