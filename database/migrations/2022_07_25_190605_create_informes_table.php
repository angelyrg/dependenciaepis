<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_informe');
            $table->text('descripcion');
            $table->string('archivo');
            $table->string('estado', 20); //Pendiente, Rechazado, Observado, Aceptado, Publicado
            $table->string('estado_coasesor', 20)->nullable(); //Pendiente, Rechazado, Observado, Aceptado, Publicado
            $table->string('estado_responsable', 20)->nullable(); //Pendiente, Rechazado, Observado, Aceptado, Publicado

            $table->string('tipo', 15); //Informe Parcial, Informe Final
            
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->cascadeOnDelete();

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
        Schema::dropIfExists('informes');
    }
}
