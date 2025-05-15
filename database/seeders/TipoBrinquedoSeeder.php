<?php

namespace Database\Seeders;

use App\Models\TipoBrinquedo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoBrinquedoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoBrinquedo::create([
            'nome' => 'Playground',
            'codigo' => 1
        ]);

        TipoBrinquedo::create([
            'nome' => 'Festa infantil',
            'codigo' => 2
        ]);
    }
}
