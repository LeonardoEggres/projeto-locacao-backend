<?php

namespace App\Http\Controllers;

use App\Services\PermissaoService;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PermissaoService $permissaoService)
    {
        return $permissaoService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PermissaoService $permissaoService)
    {
        $permissaoService->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, PermissaoService $permissaoService)
    {
        $permissaoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, PermissaoService $permissaoService)
    {
        $permissaoService->destroy($id);
    }
}
