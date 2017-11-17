<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrigenDestino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origen_destino', function (Blueprint $table) {
            

            $table->increments('id_origen_destino');
            $table->string('origen',45);
            $table->string('destino',45);
            $table->integer('cantidad');
            $table->float('precio');

            
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
        Schema::dropIfExists('origen_destino');
    }
}
