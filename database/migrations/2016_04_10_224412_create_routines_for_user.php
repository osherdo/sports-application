<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesForUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('aerobic');
            $table->string('anaerobic');
            $table->rememberToken(); //http://stackoverflow.com/questions/23262351/laravel-remember-token
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
        Schema::drop('routines');
    }
    
}
