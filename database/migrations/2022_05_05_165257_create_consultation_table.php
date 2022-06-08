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
        Schema::create('consultation', function (Blueprint $table) {
            $table->id('id_consultation');
            $table->date('visite_suivant');
            // $table->double('Montant_C');
            $table->unsignedBigInteger('fk_assistant')->nullable();
            $table->foreign('fk_assistant')->references('id_assistant')->on('assistant')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_doctor');
            $table->foreign('fk_doctor')->references('id_doctor')->on('doctor')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_patient');
            $table->foreign('fk_patient')->references('id_patient')->on('patient')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('consultation');
    }
};
