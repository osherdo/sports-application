<?php

use App\Expectation;
use Illuminate\Database\Seeder;

class ExpectationsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('expectations')->truncate(); // truncate() will also reset primary key

    Expectation::create(['name' => 'New anerobic routines']);
    Expectation::create(['name' => 'New aerobic routines']);
    Expectation::create(['name' => 'Follow']);

  }
}