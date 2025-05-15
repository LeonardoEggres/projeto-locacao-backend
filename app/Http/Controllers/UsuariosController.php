<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosRequest;
use App\Services\UsuariosService;

class UsuariosController extends Controller
{
    public function index(UsuariosService $usuariosService) 
    {
        return $usuariosService->index();
    }

    public function store(UsuariosRequest $request, UsuariosService $usuariosService)
    {
        return $usuariosService->store($request->validated());
    }

    public function show(string $id, UsuariosService $usuariosService)
    {
        return $usuariosService->show($id);
    }

    public function update(UsuariosRequest $request, string $id, UsuariosService $usuariosService)
    {
        return $usuariosService->update($request->validated(), $id);
    }

    public function destroy(string $id, UsuariosService $usuariosService)
    {
        return $usuariosService->destroy($id);
    }
}