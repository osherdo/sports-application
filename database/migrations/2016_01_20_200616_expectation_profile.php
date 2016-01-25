<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpectationProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expectation_profile', function (Blueprint $table) {
            $table->integer('profile_id')->unsigned();
            $table->integer('expectation_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expectation_profile', function (Blueprint $table) {
            Schema::drop('expectation_profile');
        });
    }
}
