<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesorProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesor_proyecto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("asesor_id")->nullable();
            $table->foreign('asesor_id')->references('id')->on('asesors')->cascadeOnDelete();

            $table->unsignedBigInteger("proyecto_id")->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesor_proyecto');
    }
}
