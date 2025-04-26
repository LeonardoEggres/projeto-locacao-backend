<?php

namespace App\Http\Controllers;

use App\Models\Brinquedo;
use Illuminate\Http\Request;
use App\Services\BrinquedoService;

class BrinquedoController extends Controller // Corrigido para "Controller"
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrinquedoService $BrinquedoService)
    {
       dd($BrinquedoService->index());
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        dd("aqui");
        // $brinquedoService->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}