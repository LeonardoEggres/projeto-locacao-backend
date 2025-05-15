<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissaoRequest;
use App\Services\PermissaoService;

class PermissaoController extends Controller
{
    public function index(PermissaoService $permissaoService)
    {
        return $permissaoService->index();
    }

    public function store(PermissaoRequest $request, PermissaoService $permissaoService)
    {
        return $permissaoService->store($request->validated());
    }

    public function show(string $id, PermissaoService $permissaoService)
    {
        return $permissaoService->show($id);
    }

    public function update(PermissaoRequest $request, string $id, PermissaoService $permissaoService)
    {
        return $permissaoService->update($request->validated(), $id);
    }

    public function destroy(string $id, PermissaoService $permissaoService)
    {
        return $permissaoService->destroy($id);
    }
}