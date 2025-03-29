<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('brinquedos', function(Blueprint $table) {
            $table->dropForeign(['marca_id']);
            $table->dropForeign(['tipo_brinquedo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('brinquedos',function(Blueprint $table) {
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('tipo_brinquedo_id')->references('id')->on('tipo_brinquedo')->onDelete('cascade');
        });
    }
};