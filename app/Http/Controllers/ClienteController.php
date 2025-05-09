<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClienteService $clienteService)
    {
        return $clienteService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ClienteService $clienteService)
    {
        return $clienteService->store($request);
    }

    public function show(string $id, ClienteService $clienteService)
    {
        return $clienteService->show($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ClienteService $clienteService)
    {
        return $clienteService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ClienteService $clienteService)
    {
        return $clienteService->destroy($id);
    }
}
