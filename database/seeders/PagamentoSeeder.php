<?php

namespace Database\Seeders;

use App\Models\Pagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pagamento::create([
            'nome' => 'Pix',
            'codigo' => 1,
            'cpf_cliente' => '567.019.384-72',
            'valor_total_pagamento' => 1000,
            'valor_locacao' => 1000,
            'data_pagamento' => '2025-05-09',
            'locacao_id' => 1
        ]);

        Pagamento::create([
            'nome' => 'Dinheiro',
            'codigo' => 2,
            'cpf_cliente' => '127.090.533-10',
            'valor_total_pagamento' => 600,
            'valor_locacao' => 1200,
            'data_pagamento' => '2025-05-09',
            'locacao_id' => 2
        ]);
    }
}
