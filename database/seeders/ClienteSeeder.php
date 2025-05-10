<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Arnaldo Pereira',
            'cpf' => '127.090.533-10',
            'data_nascimento' => '1999-10-02',
            'endereco' => 'São Roque, Avenida São Roque, 20',
            'telefone' => '(54) 991205578'
        ]);

        Cliente::create([
            'nome' => 'Joel Flick',
            'cpf' => '567.019.384-72',
            'data_nascimento' => '2003-03-22',
            'endereco' => 'Juventude da Enologia, Avenida Osvaldo Aranha, 177',
            'telefone' => '(54) 991621840'
        ]);
    }
}
