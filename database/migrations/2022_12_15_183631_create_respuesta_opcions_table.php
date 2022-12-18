<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_opcions', function (Blueprint $table) {
            $table->id('ro_id');
            $table->unsignedBigInteger('ro_res_id');
            $table->unsignedBigInteger('ro_opc_id');
            $table->foreign('ro_res_id')->references('res_id')->on('respuestas')->onDelete('cascade');
            $table->foreign('ro_opc_id')->references('opc_id')->on('opcions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_opcions');
    }
};
