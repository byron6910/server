<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');     
            $table->string('role');   
            $table->string('phone_number');   
            $table->string('code_number');
            $table->string('authy_id')->nullable();
            $table->boolean('verified')->default(false);
            
            
            $table->string('email')->unique();
            $table->string('foto')->default('default.jpg');      
            $table->string('confirmation_code');                  
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
