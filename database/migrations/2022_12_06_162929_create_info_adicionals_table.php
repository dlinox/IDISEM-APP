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
        Schema::create('info_adicionals', function (Blueprint $table) {
            $table->id('ifa_id');
            $table->date('ifa_fecha_nac'); //Qué edad tienes
            $table->enum('ifa_sexo', ['Hombre', 'Mujer']); //sexo
            $table->string('ifa_procedencia', 200); //Lugar de procedencia
            $table->enum('ifa_lengua_mat', ['Quechua', 'Aymara', 'Castellano']); //Lengua materna: 
            $table->string('ifa_escuela_pro', 160); //Escuela profesional: - Las 35 escuelas 
            $table->char('ifa_semestre', 2); //Semestre - 12 semestres
            $table->string('ifa_tipo_viv', 50); //Actualmente tu tipo de vivienda es: - Propia -Alquilada- Otro       
            $table->enum('ifa_soten', ['Mis padres', 'Un familiar', 'Me auto sostengo', 'Otros no familiares']); //Quién solventa tus estudios
            $table->string('ifa_orientacion_sex', 50); //Cuál es tu orientación sexual
            $table->enum('ifa_vive_con', ['Con mis padres (madre y/o padre)', 'Con un familiar', 'Solo', 'Con amigos']); //Quién solventa tus estudios
            $table->string('ifa_ingreso', 15); //¿Cuál es el promedio de ingreso familiar al mes?
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('info_adicionals');
    }
};
