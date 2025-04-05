<?php

namespace App\Services;
use Illuminate\Http\Request;

class BrinquedoService
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required | string',
            'codigo' => 'required | numeric',
            'valor_locacao' => 'required | numeric',
            'data_aquisicao' => 'required | date',
        ]);
    } 
}