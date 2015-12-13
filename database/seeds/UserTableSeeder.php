<?php


use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
      'name'     => 'Rakesh',
        'username' => 'Rakesh',
        'email'    => 'sharmarakesh395@gmail.com',
        'password' => Hash::make('mypass'),
    ));
  }
}