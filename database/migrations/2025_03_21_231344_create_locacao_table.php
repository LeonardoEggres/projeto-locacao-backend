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
        Schema::create('locacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brinquedo_id');
            $table->dateTime('data_atual');
            $table->decimal('valor_unitario');
            $table->decimal('valor_total');
            $table->date('data_devolucao');
            $table->string('cpf');
            $table->foreign('brinquedo_id')->references('id')->on('brinquedos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacao');
    }
};
