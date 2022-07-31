<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjecutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejecutors', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 60);
            $table->string('codigo_matricula', 10);
            $table->string('ciclo', 10)->nullable();
            
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            
            $table->unsignedBigInteger("proyecto_id");
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->cascadeOnDelete();

            $table->unsignedBigInteger("cargo_id")->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargos')->nullOnDelete();

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
        Schema::dropIfExists('ejecutors');
    }
}
