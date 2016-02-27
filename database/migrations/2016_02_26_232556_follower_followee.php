<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FollowerFollowee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower_followee', function (Blueprint $table) 
        {
            $table->integer('follower_id')->unsigned(); // follower id number,must be positive.
            $table->integer('followee_id')->unsigned(); // followee id number,must be positive.
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            //The 'follower_id' column references to the 'id' column in a 'users' table.
            //When a user is deleted in the parent column ('follower_id'), then also the user in 'id' ('users') is deleted. 
            $table->foreign('followee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
{// this method is to delete parent tables without errors for foreign keys.
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('follower_followee');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
}
}