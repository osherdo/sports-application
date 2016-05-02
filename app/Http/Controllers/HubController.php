<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Http\Requests\createPost; //getting the rules file class.
use App\Expectation;
//use App\Http\Controllers\Controller; //Because both controllers are on the same directory - this import can be deleted safely.

class HubController extends Controller
{

  protected $user;

public function __construct() { // Constructor for checking user's auth after a while.
  
    $this->middleware('auth');
    if (!Auth::check()) { return redirect('auth/login'); }

    $this->user = Auth::user(); // Auth method always use User.php model. (shown in config/auth.php)
    // Now we can call the user in other methods when we need to call the user.
    $expectations_list=expectation::all();
    view()->share('expectations_list',$expectations_list);
    
}
   public function hub()
  {
    //$user = Auth::user(); // no need to call since we have initiated the user in the constructor.
    if(!isset($this->user->profile->id)) // Only users that have a profile id ( basically have an id) will be refered to hub page.
    // I could use this !isset for the middleware of checking if user have a profile.
    
    {
      return redirect()->to('dashboard');
    }
    $profile = $this->user->profile; // Should check what's this.

    // $followingNow - a relationship between the current user and its followees.
    // In it I find the followees of the current user.
    // First getting the user the constructor generating. Then I try to find users id's that I follow and get them to a collection.
    // followee is the method from the User.php model.
    $followingNow= $this->user->followee()->get();
    // How to get a followee's post for the current user (Similar to $mutuals query):
    //I first instantiate the Post Model and by that I get a collection of the methods in this model.
    

/**
    Access own posts: (Using eager loading)
    $this->user access the user() method in the Post model via the constructor.
    Then I return the whole Post model. And then I access all the posts of the current user.
**/ 
    $get_own_posts= $this->user->posts; // Maybe I will need more details about this from Johann.
    //dd($get_own_posts);
    
    /**
     $get_followee_posts = I need the posts where user_id equals to $following now id. Means that I get the posts of my followees.
     Where clause in Laravel 5.1 requires 3 arguments: 'user_id' is the name of the column in the table associated with Post model.
     That column is what we want to compare with the third argument.
     (OPTIONAL): Second argument is an operator, which can be any of the database's supported operators.If none is given laravel assumes it's  '=';
     Third argument is what I compare the first parameter with. So I get all user id's that match my followee's list.
     Before trying to echo out the values of the query, try to dd() the var to see its contents.
    dd($followingNow->lists('id')); // Get the 'id' column value in an array.
    **/

    $get_followee_posts= Post::whereIn('user_id',$followingNow->lists('id'))->get();
    //dd($get_followee_posts);
    // After dd() is showing an array with items - it's time to pass the variable value within a return statement.
    // Then iterate over them in the view (@foreach).

    
    // Profile is the name of the model.
    $get_post_uploader=User::WhereIn('name',$followingNow->lists('name'))->get();
    //dd($get_post_uploader);

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

      return view('hub', compact('get_own_posts','mutuals','get_followee_posts','get_post_uploader'))->with(['user' => $this->user]);
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
  $notify= "You're now following".$userToFollow->name; // notification about following user.
  return back()->with("message",$notify); // go to last page. using the name "message" (could be other name).
  //The back() function generates a redirect response to the user's previous location: 
}}