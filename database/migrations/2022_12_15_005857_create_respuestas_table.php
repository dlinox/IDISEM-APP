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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('res_id');
            $table->string('res_respuesta')->nullable(); //para respueta unica o otros
            $table->boolean('res_opciones')->default(1); //defaul con opciones
            $table->integer('res_ponderado_total')->default(0);
            //$table->json('res_respuesta');
            $table->bigInteger('res_use_id')->unsigned();//estudiante
            $table->bigInteger('res_pre_id')->unsigned();//pregunta
            $table->foreign('res_use_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('res_pre_id')->references('pre_id')->on('preguntas')->onDelete('restrict');
            $table->unique(['res_use_id','res_pre_id']);
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
        Schema::dropIfExists('respuestas');
    }
};
