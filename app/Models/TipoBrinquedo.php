<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBrinquedo extends Model
{
    use HasFactory;

    protected $table = 'tipo_brinquedo';

    protected $fillable = [
        'nome',
        'codigo'
    ];
}
