<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;

    protected $table = 'locacao';

    protected $fillable = [
        'data_atual',
        'valor_unitario',
        'valor_total',
        'data_devolucao',
        'cpf',
        'brinquedo_id'
    ];

    public function brinquedo()
    {
        return $this->belongsTo(Brinquedo::class);
    }
}
