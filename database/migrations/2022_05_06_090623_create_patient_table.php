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
        Schema::create('patient', function (Blueprint $table) {
            $table->id('id_patient');
            $table->string('Nom');
            $table->string('Prenom');
            $table->date('DateNaissance');
            $table->string('Sexe');
            $table->string('Adresse');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('Assurance');
            $table->unsignedBigInteger('fk_assistant');
            $table->foreign('fk_assistant')->references('id_assistant')->on('assistant')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_doctor');
            $table->foreign('fk_doctor')->references('id_doctor')->on('doctor')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('patient');
    }
};
