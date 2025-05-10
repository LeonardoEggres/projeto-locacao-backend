<?php

namespace Database\Seeders;

use App\Models\Locacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locacao::create([
            'data_atual' => '2025-05-09',
            'valor_unitario' => 500,
            'valor_total' => 1000,
            'data_devolucao' => '2025-05-12',
            'cpf' => '567.019.384-72',
            'brinquedo_id' => 2
        ]);

        Locacao::create([
            'data_atual' => '2025-05-09',
            'valor_unitario' => 400,
            'valor_total' => 1200,
            'data_devolucao' => '2025-05-12',
            'cpf' => '127.090.533-10',
            'brinquedo_id' => 1
        ]);
    }
}
