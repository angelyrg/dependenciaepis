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
            $table->string('archivo');
            $table->string('estado_asesor', 20)->nullable(); //Pendiente, Rechazado, Observado, Aceptado
            $table->string('estado_coasesor', 20)->nullable(); //Pendiente, Rechazado, Observado, Aceptado
            
            $table->string('estado', 20)->nullable(); //Pendiente, Devuelto, Publicado 

            $table->string('tipo', 15); //Informe Parcial, Informe Final
            
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->cascadeOnDelete();

            $table->timestamps();
        });
    }


    
    public function down()
    {
        Schema::dropIfExists('informes');
    }
}
