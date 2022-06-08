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
        Schema::create('doctor', function (Blueprint $table) {
            $table->id('id_doctor');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Sexe');
            $table->date('DateNaissance');
            $table->string('Adresse');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->unsignedBigInteger('fk_admin');
            $table->foreign('fk_admin')->references('id_admin')->on('admin')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('doctor');
    }
};
