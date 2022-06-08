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
        Schema::create('traitements', function (Blueprint $table) {
            $table->id('id_traitement');
            $table->unsignedBigInteger('fk_service');
            $table->foreign('fk_service')->references('id_service')->on('services')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fk_dent');
            $table->foreign('fk_dent')->references('id_dents')->on('dents')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('traitements');
    }
};
