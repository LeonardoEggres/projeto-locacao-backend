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
        Schema::create('locacao_item', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->decimal('valor_unitario');
            $table->decimal('valor_total_item');
            $table->unsignedBigInteger('locacao_id');
            $table->unsignedBigInteger('brinquedo_id');
            $table->foreign('locacao_id')->references('id')->on('locacao');
            $table->foreign('brinquedo_id')->references('id')->on('brinquedos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacao_item');
    }
};
