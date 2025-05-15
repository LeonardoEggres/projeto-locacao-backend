<?php

namespace Database\Seeders;

use App\Models\Papeis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapeisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Papeis::create([
            'nome' => 'Administrador',
            'codigo' => 1
        ]);

        Papeis::create([
            'nome' => 'Caixa',
            'codigo' => 2
        ]);
    }
}
