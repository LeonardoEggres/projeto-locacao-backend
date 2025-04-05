<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrinquedoController extends Controller // Corrigido para "Controller"
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       dd('alooou');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}