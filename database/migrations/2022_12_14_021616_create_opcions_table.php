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
        Schema::create('opcions', function (Blueprint $table) {
            $table->id('opc_id');
            $table->string('opc_detalle', 250);
            $table->integer('opc_ponderado')->default(0);
            $table->unsignedBigInteger('opc_pre_id');
            $table->foreign('opc_pre_id')->references('pre_id')->on('preguntas')->onDelete('cascade');
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
        Schema::dropIfExists('opcions');
    }
};
