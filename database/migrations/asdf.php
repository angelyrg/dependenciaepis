<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoAsesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_asesor', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("proyecto_id");
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->cascadeOnDelete();

            $table->unsignedBigInteger("asesor_id");
            $table->foreign('asesor_id')->references('id')->on('asesors')->cascadeOnDelete();

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
        Schema::dropIfExists('proyecto_asesor');
    }
}
