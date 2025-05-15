<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocacaoItem extends Model
{
    use HasFactory;

    protected $table = 'locacao_item';

    protected $fillable = [
        'quantidade',
        'valor_unitario',
        'valor_total_item',
        'locacao_id',
        'brinquedo_id'
    ];

    public function locacao()
    {
        return $this->belongsTo(Locacao::class);
    }

    public function brinquedo()
    {
        return $this->belongsTo(Brinquedo::class);
    }
}
