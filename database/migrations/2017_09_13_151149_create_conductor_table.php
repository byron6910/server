<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor', function (Blueprint $table) {
            $table->increments('id_conductor');
            $table->string('nombre',45);
            $table->string('apellido',45);
            //coreccion integer
            $table->integer('telefono')->length(10)->unsigned();
            $table->string('direccion',45);
            $table->string('correo',45);
            
            $table->integer('id_bus')->length(10)->unsigned();
            $table->foreign('id_bus')->references('id_bus')->on('bus')
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
        Schema::dropIfExists('conductor');
    }
}
