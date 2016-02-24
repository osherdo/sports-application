<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { // Check if I should change to Schema::table after first migration.
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            // Create a user_id so we'll know who posted this post.
            //Reference the id column on the user table.
            //We want whenever a user is deleted - so his associated posts will be deleted.
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->text('full_post')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
