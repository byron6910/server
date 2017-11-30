<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('ci');
            $table->string('nombre',45);
            $table->string('apellido',45);
            $table->integer('telefono')->length(10)->unsigned();
            $table->string('ciudad',45);
            $table->string('calle',45);
            $table->string('postal')->length(10);
            $table->string('correo',45)->unique();
            $table->string('usuario',45)->unique();
            // para manejo de datos
            //$table->enum('tipo',['cliente','funcionario'])->default('cliente');
            
            $table->string('password');
            $table->string('foto');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
