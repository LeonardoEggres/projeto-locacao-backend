<?php

namespace Database\Seeders;

use App\Models\Usuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuarios::create([
            'nome' => 'Leonardo Eggres',
            'telefone' => '(54) 991555555',
            'cpf' => '913.078.473-19',
            'papel_id' => 1
        ]);

        Usuarios::create([
            'nome' => 'Jeniffer Carvalho',
            'telefone' => '(54) 991577777',
            'cpf' => '731.874.089-31',
            'papel_id' => 1
        ]);
    }
}
