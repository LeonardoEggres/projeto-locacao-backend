<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('locacao_id');
            $table->string('nome');
            $table->integer('codigo');
            $table->string('cpf_cliente');
            $table->decimal('valor_total_pagamento');
            $table->decimal('valor_locacao');
            $table->date('data_pagamento');
            $table->foreign('locacao_id')->references('id')->on('locacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
