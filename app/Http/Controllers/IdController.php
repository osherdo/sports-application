<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Expectation;
use App\Profile;
use App\FollowerFollowee;

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
        // $slug - A slug is assigned to the username.
  		$username= \App\User::where('username',$slug)->first(); // first() - returns the first element of the get array and turn it into an object.
  		// if using ->get(); - Laravel using Eloquent array to refer to this data.
        

        $follow = FollowerFollowee::where("follower_id", $user->id)
            ->where("followee_id", $username->id)
            ->first();

        if ($follow) {
            $follow = true;
        }
        else {
            $follow = false;
        }

        //dd($follow);

        // To check if no user has been found , we use the isset.

        if(isset($username->id))
        {    
        return view('id_personal',compact('username','user','id_expectations','profile', 'follow'));
        }else{
            return redirect()->back(); // return to search page in case no user has been found.
        }
    }



    public function follow_current($id)
    {
    	  //dd($slug);
    	  $user =Auth::user();
           $followerFollowee = new \App\FollowerFollowee; // Creating a new instance of the model.
          $followerFollowee->follower_id = $user->id; // Accessing the model's associated table, and then accesing its column, and then assing the column a new record that's the current user id.
          $followerFollowee->followee_id = $id; // Assigning the future followed user id to the followee_id column.
         $followerFollowee->save();
          // doing the same thing above with the attach() method.
         //$user->followee()->attach($id); // Accessing the users' followee relationship and attaching the id from the route.(route gets the id automatically).
         $follow_current=  \App\User::find($id);//searches the primary key with the value in $id
    	  $notify= "You're now following ".$follow_current->username."."; // notification about following the current profile user.
  		  return back()->with("message",$notify); // go to last page. using the name "message" (could be other name).
    }

        public function unfollow_current($id) // Getting $id from the view.

    {
        //dd($id); 
        $user= Auth::user();
        // Gets the user to unfollow by finding the current id of profile page.
        //$follow_current= \App\User::find($id);
        //$user_to_unfollow=$this->user->followers()->detach($follow_current);
        // Get the list of users that follow a followee.
        //$userFollowers= User::whereIn('id',$userfollowers->lists('id'))->get;

        $current_follower= $user->id;
        // Deleting the followed user with the variables we have.
         $follow_current=\App\User::find($id);
        // dd($follow_current->username);
        $deletedRows = \App\FollowerFollowee::where('followee_id', $id)
        ->where('follower_id',$current_follower)->delete();

        return back()->with('message',$follow_current->username."is now unfollowed.");
        //dd($userFollowers);
    }
 

}

