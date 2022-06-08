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
        Schema::create('operations', function (Blueprint $table) {
            $table->id('id_operation');
            $table->unsignedBigInteger('fk_consultation');
            $table->foreign('fk_consultation')->references('id_consultation')->on('consultation')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_traitement');
            $table->foreign('fk_traitement')->references('id_traitement')->on('traitement')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('operations');
    }
};
