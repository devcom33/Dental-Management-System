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
        Schema::create('event_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('NomP');
            $table->string('NomD');
            $table->string('prenomP');
            $table->string('prenomD');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('status');
            $table->unsignedBigInteger('fk_doctor');
            $table->foreign('fk_doctor')->references('id_doctor')->on('doctor')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_patient');
            $table->foreign('fk_patient')->references('id_patient')->on('patient')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_consultation');
            $table->foreign('fk_consultation')->references('id_consultation')->on('consultation')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('event_doctors');
    }
};
