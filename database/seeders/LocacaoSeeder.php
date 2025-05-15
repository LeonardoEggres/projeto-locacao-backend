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
            "codigo" => "1",
            "data_atual" => "2025-07-06",
            "valor_total" => "14",
            "data_devolucao" => "2025-06-04",
            "cliente_id" => "1",
            "itens" => [
              "quantidade" => "2",
              "valor_unitario" => "7",
              "valor_total_item" => "14",
              "locacao_id" => "1",
              "brinquedo_id" => "1"
            ]          
        ]);

        Locacao::create([
            "codigo" => "2",
            "data_atual" => "2025-07-06",
            "valor_total" => "6",
            "data_devolucao" => "2025-06-04",
            "cliente_id" => "1",
            "itens" => [
              "quantidade" => "1",
              "valor_unitario" => "6",
              "valor_total_item" => "6",
              "locacao_id" => "1",
              "brinquedo_id" => "1"
            ]
        ]);
    }
}
