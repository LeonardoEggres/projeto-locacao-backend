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
        Schema::create('brinquedos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('codigo');
            $table->unsigenedBigInteger('marca_id');
            $table->unsigenedBigInteger('tipo_brinquedo_id');
            $table->unsigenedBigInteger('locacao_id');
            $table->decimal('valor_total_locacao');
            $table->date('data_aquisicao');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('tipo_brinquedo_id')->references('id')->on('tipo_brinquedo');
            $table->foreign('locacao_id')->references('id')->on('locacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brinquedos');
    }
};
