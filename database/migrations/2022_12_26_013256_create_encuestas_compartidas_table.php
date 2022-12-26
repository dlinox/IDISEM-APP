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
        Schema::create('encuestas_compartidas', function (Blueprint $table) {
            $table->id('ec_id');
            $table->boolean('ec_permiso')->default(0);
            $table->unsignedBigInteger('ec_adm_id');
            $table->unsignedBigInteger('ec_enc_id');
            $table->foreign('ec_adm_id')->references('id')->on('admins')
                ->onDelete('restrict');
            $table->foreign('ec_enc_id')->references('enc_id')->on('encuestas')
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
        Schema::dropIfExists('encuestas_compartidas');
    }
};
