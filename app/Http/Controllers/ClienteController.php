<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function index(ClienteService $clienteService)
    {
        return $clienteService->index();
    }

    public function store(ClienteRequest $request, ClienteService $clienteService)
    {
        return $clienteService->store($request->validated());
    }

    public function show(string $id, ClienteService $clienteService)
    {
        return $clienteService->show($id);
    }

    public function update(ClienteRequest $request, string $id, ClienteService $clienteService)
    {
        return $clienteService->update($request->validated(), $id);
    }

    public function destroy(string $id, ClienteService $clienteService)
    {
        return $clienteService->destroy($id);
    }
}