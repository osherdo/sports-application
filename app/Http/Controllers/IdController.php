<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Expectation;

class IdController extends Controller
{
	public function __construct()
	{
		 $this->middleware('auth');
    if (!Auth::check()) 
    	{ 
    		return redirect('auth/login'); 
		}
		$this->user = Auth::user(); // Auth method always use User.php model. (shown in config/auth.php)
		$expectation_list=Expectation::all();
		view()->share('expectations_list',$expectation_list);
	}


    public function get_details($slug,Request $request)
    {
    	$user = $request->user(); // Grab the authenticated user for the request. and store it in $user.
  		//return $slug; // returning the user name (which is now the slug).
  		$username= \App\User::where('username',$slug)->first(); // first() - returns the first element of the get array and turn it into an object.
  		// if using ->get(); - Laravel using Eloquent array to refer to this data.

    	return view('id_personal',compact('username','user'));

    }

    public function follow_current($id)
    {
    	  //dd($slug);
    	  $user =Auth::user();
    	  $user->followee()->attach($id); // Accessing the users' followee relationship and attaching the id from the route.(route gets the id automatically).
    	  $follow_current= \App\User::find($id);//searches the primary key with the value in $id
    	  $notify= "You're now following".$follow_current->username; // notification about following the current profile user.
  		  return back()->with("message",$notify); // go to last page. using the name "message" (could be other name).
    }

}

