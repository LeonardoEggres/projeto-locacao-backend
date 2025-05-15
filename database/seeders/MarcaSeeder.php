<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marca::create([
            'nome' => 'Lego',
            'codigo' => 1
        ]);

        Marca::create([
            'nome' => 'Rihappy',
            'codigo' => 2
        ]);

        Marca::create([
            'nome' => 'Estrela',
            'codigo' => 3
        ]);
    }
}
