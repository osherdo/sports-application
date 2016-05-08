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
            $table->increments('id')->unsigned()->index();
            $table->string('name');
            $table->enum('type',array('aerobic','anaerobic'))->default('anaerobic');
            $table->integer('user_id');
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
