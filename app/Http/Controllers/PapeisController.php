<?php

namespace App\Http\Controllers;

use App\Http\Requests\PapeisRequest;
use App\Services\PapeisService;

class PapeisController extends Controller
{
    public function index(PapeisService $papeisService)
    {
        return $papeisService->index();
    }

    public function store(PapeisRequest $request, PapeisService $papeisService)
    {
        return $papeisService->store($request->validated());
    }

    public function show(string $id, PapeisService $papeisService)
    {
        return $papeisService->show($id);
    }

    public function update(PapeisRequest $request, string $id, PapeisService $papeisService)
    {
        return $papeisService->update($request->validated(), $id);
    }

    public function destroy(string $id, PapeisService $papeisService)
    {
        return $papeisService->destroy($id);
    }
}