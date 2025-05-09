<?php

namespace App\Http\Controllers;

use App\Services\PapeisService;
use Illuminate\Http\Request;

class PapeisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PapeisService $papeisService)
    {
        return $papeisService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PapeisService $papeisService)
    {
        return $papeisService->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, PapeisService $papeisService)
    {
        return $papeisService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, PapeisService $papeisService)
    {
        return $papeisService->destroy($id);
    }
}
