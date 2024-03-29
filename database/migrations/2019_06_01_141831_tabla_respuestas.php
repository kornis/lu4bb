<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas',function(Blueprint $table){
            $table->increments('id');
            $table->text('respuestas');
            $table->enum('valor',['verdadero','falso'])->default('falso');
            $table->integer('pregunta_id')->unsigned();
            $table->enum('tipo',['tecnica','teorico'])->default('tecnica');
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
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
        Schema::dropIfExists('respuestas');
    }
}
