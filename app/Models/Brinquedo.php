<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\TipoBrinquedo;

class Brinquedo extends Model
{
    use HasFactory;

    protected $table = 'brinquedos';

    protected $fillable = [
        'nome',
        'codigo',
        'valor_locacao',
        'data_aquisicao',
        'marca_id',
        'tipo_brinquedo_id'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function tipo_brinquedo()
    {
        return $this->belongsTo(TipoBrinquedo::class);
    }
}
