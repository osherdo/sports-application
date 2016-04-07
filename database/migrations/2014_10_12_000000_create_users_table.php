<?php

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
            $table->string('username',20); 
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->dropColumn('age');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
{ // this method is to delete parent tables without errors for foreign keys.
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('users');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
}
}
