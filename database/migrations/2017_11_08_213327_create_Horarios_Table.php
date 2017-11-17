<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->date('fecha_horario');
            $table->time('hora');
            
        
            $table->integer('id_origen_destino')->length(10)->unsigned();
            $table->foreign('id_origen_destino')->references('id_origen_destino')->on('origen_destino')
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
        Schema::dropIfExists('horarios');
    }
}
