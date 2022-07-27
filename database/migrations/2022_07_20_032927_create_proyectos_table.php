<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_grupo');
            $table->string('modalidad_grupo', 20); //Monovalente, Polivalente, Inter facultativo
            $table->string('nombre_proyecto');
            $table->unsignedBigInteger("modalidad_id")->nullable();
            $table->text('descripcion');
            $table->string('estado', 20)->default('Inicio'); //Inicio, Parcial, Completado
            $table->integer('ctd_max_ejecutores')->default(0);
            
            $table->foreign('modalidad_id')->references('id')->on('modalidads')->cascadeOnUpdate()->nullOnDelete();;
            
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
        Schema::dropIfExists('proyectos');
    }
}
