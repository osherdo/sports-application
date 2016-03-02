<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\createPost; //getting the rules file class.
//use App\Http\Controllers\Controller; //Because both controllers are on the same directory - this import can be deleted safely.

class HubController extends Controller
{

  protected $user;

public function __construct() { //constructor for checking user's auth after a while.

    $this->middleware('auth');
    if (!Auth::check()) { return redirect('auth/login'); }

    $this->user = Auth::user(); // Auth method always use User.php model. (shown in config/auth.php)
    // Now we can call the user in other methods when we need to call the user.
}
   public function hub()
  {
    //$user = Auth::user(); // no need to call since we have initiated the user in the constructor.
    $profile = $this->user->profile;
    // $followingNow - a relationship between the current user and its followees.
    //Next I find the followees of the current user.
    //getting the user that's the instructor generating. Then I try to find user'id's that I follow and get them to a collection.
    $followingNow= $this->user->followee()->get();
    //dd($followingNow->lists('id')); // Get the 'id' column value in an array.
// Profile is the name of the model.
    $mutuals = Profile::whereHas('expectations', function($query) use ($profile,$followingNow)
    {
        $query->whereIn('expectations.id', $profile->expectations->lists('id')); //returns a dropdown of the id's associated to the user's expectations.
      
    })->whereNotIn('profiles.user_id',$followingNow->lists('id'))->get(); // exclude all the id's that match the $followingNow variable criteria.

    //dd($mutuals->toArray()); //Inspect the $mutuals collection.
/**
whereHas does two things for you in one - it ensures that in the Collection of profiles being returned:

1)each profile being returned has at least one expectation, and
2)those profiles are further constrained by a where condition (in this case, that the expectation id is one of the current user profile's expectations)
*/


    if($this->user)
    {

      return view('hub', compact('mutuals'))->with(['user' => $this->user]);
    }
    else
    {
      return redirect('auth/login');
    }
}

protected function insert_posts (createPost $request) // first parameter is going through the validation file.
//Then post input is saved to the $request object.
{
  //dd($request);
  $message="Post added succesfully";
  //$mutuals = Profile::whereHas('expectations', function($query) use ($profile));

  //$user = Auth::user(); //Redundtant since it's declared in the construct method already.

  // A post belongs to a user.
  $post = $this->user->posts()->create([

    'full_post'=>$request->get('post') // get the input name.

    ]);

        return back()->with("message",$message);
}

protected function add_followee($user_id) //$user_id passed from the route.
{
  //dd($user_id); // Check out the contents of a variable; 

  //$user_id value is taken from the view.
  $user =Auth::user();
  // after receiving the user id with $user_id.
  //now it's time to get the name of the user.
  $user->followee()->attach($user_id); // attach the name from the route.
  // followee() is the name of the method from the user.php model.
   $userToFollow = User::find($user_id); // passing the user id. Now I can access properties of the user in the db. 
  $notify= "you're now following".$userToFollow->name; // notification about following user.
  return back()->with("message",$notify); // go to last page. using the name "message" (could be other name).
  //The back() function generates a redirect response to the user's previous location: 
}


}

