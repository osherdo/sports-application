<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //Because both controllers are on the same directory - this import can be deleted safely.

class HubController extends Controller
{
   public function hub()
  {
    $user = Auth::user();
    $profile = $user->profile;

    $mutuals = Profile::whereHas('expectations', function($query) use ($profile)
    {
        $query->whereIn('expectations.id', $profile->expectations->lists('id'));
    })->get();


    if($user)
    {
      return view('hub', compact('user', 'mutuals'));
    }
    else
    {
      return redirect('auth/login');
    }
}
    
    
   
/*
access current user: Auth::user()
       QUERY: access current user associated columns mysql
     return * from expectation_profile where expectation_id contain at least 1 value like the current user have. 
*/
  /*


  public function mutual()
    { 
      //$mutualUsers = DB::table('expectation_profile')->where(expectation_id,$user->Auth::user);
// So you have a profile:
$profile = Auth::user()->profile;

$mutuals = Profile::whereHas('expectations', function($query) use ($profile)
{
  $query->whereIn('expectations.id', $profile->expectations->lists('id'));
})->get();
//This is basic stuff - you have to pass the data from the controller to the view
return view('hub', compact('mutuals'));

*/
    }
