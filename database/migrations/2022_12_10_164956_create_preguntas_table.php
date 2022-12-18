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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('pre_id');
            $table->string('pre_titulo', 200);
            $table->enum('pre_tipo', ['TEXT', 'TEXTAREA', 'RADIO', 'CHECKBOX', 'SELECT']);
            $table->enum('pre_opcion', ['NO','UNICA','MULTIPLE']);
            $table->boolean('pre_estado')->default(1);
            $table->unsignedBigInteger('pre_sec_id');
            $table->foreign('pre_sec_id')->references('sec_id')->on('seccions')
                ->onDelete('cascade');
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
        Schema::dropIfExists('preguntas');
    }
};
