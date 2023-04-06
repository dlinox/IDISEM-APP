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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('student')->unique();
            $table->string('email')->unique();
            $table->dateTime('tyc_date')->nullable();
            $table->boolean('tyc_state')->default(0);
            $table->boolean('password_state')->default(0);
            $table->boolean('info_state')->default(0);
            $table->boolean('state')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_temp', 8)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('student')->references('est_id')->on('estudiantes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
