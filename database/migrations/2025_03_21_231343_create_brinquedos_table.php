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
            $table->string('nome')->nullable();
            $table->integer('codigo')->nullable();
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('tipo_brinquedo_id');
            $table->decimal('valo_locacao')->nullable();
            $table->date('data_aquisicao')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('tipo_brinquedo_id')->references('id')->on('tipo_brinquedo');
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
