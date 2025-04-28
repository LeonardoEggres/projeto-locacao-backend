<?php

namespace App\Http\Controllers;

use App\Services\UsuariosService;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsuariosService $usuariosService) 
    {
        return $usuariosService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UsuariosService $usuariosService)
    {
        $usuariosService->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, UsuariosService $usuariosService)
    {
        $usuariosService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, UsuariosService $usuariosService)
    {
        $usuariosService->destroy($id);
    }
}
