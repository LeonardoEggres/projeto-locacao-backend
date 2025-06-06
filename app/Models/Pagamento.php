<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';

    protected $fillable = [
        'nome',
        'codigo',
        'cpf_cliente',
        'valor_total_pagamento',
        'valor_locacao',
        'data_pagamento',
        'locacao_id'
    ];

    public function locacao()
    {
        return $this->belongsTo(Locacao::class);
    }
}
