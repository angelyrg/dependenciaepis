<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesors', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 60);
            $table->string('dni', 8);
            //$table->string('cargo', 50)->nullable(); //anterior:rol
            $table->boolean('estado')->default(1);

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            
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
        Schema::dropIfExists('asesors');
    }
}
