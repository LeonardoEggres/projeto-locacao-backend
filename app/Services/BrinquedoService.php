<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Brinquedo;

class BrinquedoService
{
    public function index()
    {
        dd("aqui");
    }

    public function store($request)
    {
        dd("aqui");
        $data = $request->validate([
            'nome' => 'required | string',
            'codigo' => 'required | numeric',
            'valor_locacao' => 'required | numeric',
            'data_aquisicao' => 'required | date',
        ]);
        
        Brinquedo::create($data);
    } 
}