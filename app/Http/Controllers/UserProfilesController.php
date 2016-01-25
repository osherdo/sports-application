<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserProfilesController extends Controller
{
    protected function store(Request $request) //That's request object.
    {
        $user = Auth::user();

        // A profile belongs to a user
        $profile = $user->profile()->create([
            'name' => $request['name'],
            'age' => $request['age'],
            'goals' => $request['goals'],
            'activityType' => $request['activityType']
        ]);

        $profile->expectations()->attach($request->expectations);

        return redirect('hub');  // this is where you redirect to the hub after you store the User
    }
    /*
    Note: This function should both insert profile data and redirect to the Hub.
 function pass_multiple_values($first_arg,$second_arg,$third_arg)
{

   $value1= $first_arg; // Calculated some value and assign it to value1.
   $value2= $secon_arg;
   $value3= $third_arg;

    return array($value1,$value2,$value3);
}
*/

}

