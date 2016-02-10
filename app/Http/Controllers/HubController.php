<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller; //Because both controllers are on the same directory - this import can be deleted safely.

class HubController extends Controller
{
   public function hub()
  {
    $user = Auth::user();
    $profile = $user->profile;

    $mutuals = Profile::whereHas('expectations', function($query) use ($profile)
    {
        $query->whereIn('expectations.id', $profile->expectations->lists('id')); //returns a dropdown of the id's associated to the user's expectations.
    })->get();

    //dd($mutuals->toArray()); //Inspect the $mutuals collection.
/**
whereHas does two things for you in one - it ensures that in the Collection of profiles being returned:

1)each profile being returned has at least one expectation, and
2)those profiles are further constrained by a where condition (in this case, that the expectation id is one of the current user profile's expectations)
*/


    if($user)
    {
      return view('hub', compact('user', 'mutuals'));
    }
    else
    {
      return redirect('auth/login');
    }
}

}

