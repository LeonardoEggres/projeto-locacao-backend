<?php

namespace Database\Seeders;

use App\Models\Brinquedo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrinquedoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brinquedo::create([
        'nome' => 'Piscina de Bolinhas',
        'codigo' => 1,
        'valor_locacao' => 400,
        'data_aquisicao' => '2025-05-09',
        'marca_id' => 1,
        'tipo_brinquedo_id' => 1
        ]);

        Brinquedo::create([
        'nome' => 'Castelinho Inflavel',
        'codigo' => 2,
        'valor_locacao' => 500,
        'data_aquisicao' => '2025-05-08',
        'marca_id' => 2,
        'tipo_brinquedo_id' => 2
        ]);
    }
}
