<?php

namespace App\Console\Commands;

//namespace App\Console\Commands\App\User; - can't have multiple namespaces.

use Illuminate\Console\Command;
use \App\User;

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
    //$empty_profiles= App\User::doesntHave('profile')->get(); // Getting all the records that does not have profile relationship records.
    $empty_profiles = User::doesntHave('profile')->delete();

    /* This won't work since the code is executed in the first line, and the second line does not get any arguments then.
    $empty_profiles = App\User::doesntHave('profile')->delete();
    $empty_profiles->delete();

    This would work:
    $empty_profiles = App\User::doesntHave('profile');
    $empty_profiles->delete();
    */

    }
}
