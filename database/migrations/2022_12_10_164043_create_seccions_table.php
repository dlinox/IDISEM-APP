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
        Schema::create('seccions', function (Blueprint $table) {
            $table->id('sec_id');
            $table->string('sec_titulo', 120);
            $table->string('sec_descripcion', 200)->nullable();
            $table->unsignedBigInteger('sec_enc_id');
            $table->foreign('sec_enc_id')->references('enc_id')->on('encuestas')
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
        Schema::dropIfExists('seccions');
    }
};
