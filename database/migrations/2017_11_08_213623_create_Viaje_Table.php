<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaje', function (Blueprint $table) {
            $table->increments('id_viaje');
            $table->boolean('estado');

            $table->integer('id_cooperativa')->length(10)->unsigned();
            $table->foreign('id_cooperativa')->references('id_cooperativa')->on('cooperativa')
            ->onDelete('cascade');

            $table->integer('id_horario')->length(10)->unsigned();
            $table->foreign('id_horario')->references('id_horario')->on('horarios')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('viaje');
    }
}
