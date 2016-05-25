<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PartialRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'removepartialreg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removing data of users from users table in case profile creation has not been completed.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    // type the query to get users that have no data in their profiles.
        //if a user id is not on profiles table - delete the user id on user's table.

    // First Guess.
    $user_id=new App\User();
    $data=$user_id->all(array('id')); // Getting the 'id' columns from the db. Can retrieve more columns by passing their name in the paranthesis.
    /*
    $id_to_delete=App\User::find(5);
    $id_to_delete->delete();
    */

    //Second Guess:

    $profile=new App\profile();
    $profile_id=$profile->all(array('id')); // Getting all the id's in the profiles table.
    
    // Check this query in tinker.
    $missed_id = DB::table('profiles')
                    ->whereNotIn('id', $data)
                    ->get();
    }
}
