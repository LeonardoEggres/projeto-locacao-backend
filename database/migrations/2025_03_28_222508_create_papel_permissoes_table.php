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
        Schema::create('papel_permissoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('papel_id');
            $table->unsignedBigInteger('permissao_id');
            $table->foreign('papel_id')->references('id')->on('papeis');
            $table->foreign('permissao_id')->references('id')->on('permissoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papel_permissoes');
    }
};
