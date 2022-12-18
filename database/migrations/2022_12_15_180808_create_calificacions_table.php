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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id('cal_id');
            $table->string('cal_detalle', 40);
            $table->longText('cal_mensaje');
            $table->integer('cal_max');
            $table->integer('cal_min');
            $table->string('cal_img_url')->nullable();
            $table->unsignedBigInteger('cal_enc_id');
            $table->foreign('cal_enc_id')->references('enc_id')->on('encuestas')->onDelete('cascade');
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
        Schema::dropIfExists('calificacions');
    }
};
