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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('est_id');
            $table->string('est_nombres', 120);
            $table->string('est_paterno', 80)->nullable();
            $table->string('est_materno', 80)->nullable();
            $table->string('est_correo', 120)->nullable();
            $table->char('est_dni', 8)->nullable();
            $table->char('est_celular', 9)->nullable();
            $table->char('est_codigo_mat', 6)->unique();
            $table->boolean('est_estado')->default(0);
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
        Schema::dropIfExists('estudiantes');
    }
};
