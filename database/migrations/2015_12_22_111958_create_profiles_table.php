<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('gender',5);
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('age')->unsigned()->nullable();
            $table->string('goals')->nullable();;
            $table->string('activityType')->nullable();
            $table->rememberToken(); // for remember me feature.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
