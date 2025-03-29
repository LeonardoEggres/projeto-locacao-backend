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
        Schema::table('locacao', function(Blueprint $table) {
            $table->dropForeign(['brinquedo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('locacao',function(Blueprint $table) {
            $table->foreign('brinquedo_id')->references('id')->on('brinquedos')->onDelete('cascade');
        });
    }
};