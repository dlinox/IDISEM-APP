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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id('enc_id');
            $table->string('enc_titulo', 200)->unique();
            $table->string('enc_descripcion', 254)->nullable();
            $table->boolean('enc_estado')->default(1);
            $table->unsignedBigInteger('enc_adm_id');
            $table->foreign('enc_adm_id')->references('id')->on('admins')
                ->onDelete('restrict');
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
        Schema::dropIfExists('encuestas');
    }
};
