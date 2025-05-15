<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(MarcaSeeder::class);
       $this->call(TipoBrinquedoSeeder::class);
       $this->call(PapeisSeeder::class);
       $this->call(ClienteSeeder::class);
       $this->call(BrinquedoSeeder::class);
       $this->call(UsuarioSeeder::class);
    }
}
