<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{

    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('comentario');
            $table->integer("user_id");
            $table->string('archivo')->nullable();

            $table->unsignedBigInteger("informe_id");
            $table->foreign('informe_id')->references('id')->on('informes')->cascadeOnDelete();

            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('comentarios');
    }
}
