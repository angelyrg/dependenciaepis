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
        Schema::create('redaccions', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_documento');
            $table->string('year_documento', 4);
            $table->string('nombre_documento');
            $table->string('tipo_documento')->nullable();
            $table->string('tipo_informe')->nullable();

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
        Schema::dropIfExists('redaccions');
    }
};
