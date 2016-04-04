<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User; // Import the User Model to the controller.
use Input;
use App\Profile;


class SearchController extends Controller
{
	public function __construct() { // Constructor for checking user's auth after a while.

    $this->middleware('auth');
    if (!Auth::check()) 
    	{ 
    		return redirect('auth/login'); 
		}


    $this->user = Auth::user(); // Auth method always use User.php model. (shown in config/auth.php)
    // Now we can call the user in other methods when we need to call the user.
} 
    protected function query(Request $request) // search is the named route.
    // Then post input is saved to the $request object.

    {
        $user = $request->user(); // Grab the authenticated user for the request. and store it in $user.
        $userInput= $request->get('NameUser'); // id of input type text.
        $UserNameQuery = User::where('name',$userInput)->orWhere('username', $userInput)->get(); 
        dd($UserNameQuery);
        // Querying 2 columns: 'username' and 'name' (chaining the search on username column:);

      return view('search',compact('user','userInput'));

    	
    }

    public function multiSelect(Request $request)

    {
        $amount = Input::get('amount'); // First getting the age range from the input in html (name="amount").
        $amount = str_replace(' ','',$amount); //remove the blank spaces between the ages value, if there's any.
        $amount = explode('-',$amount); // is breaking the value 16-45, as 16 and 45, '-' being the breaking point. And finally turns the value into array.
        // Getting the array value as index 0 and 1.
        $min = $amount[0];
        $max = $amount[1];
        //dd($amount); // getting the age range.
         
        $user = $request->user();
        $userSelect = Input::get('select_preferences');
        //dd($userSelect); // Getting user selection.
        
        // Chain 2 queries: find both same expectations and same age range.
        //pass in the $userSelect variable into the closure (with use).
        $prefQuery = Profile::whereHas('expectations', function($query) use($userSelect)
        {
        $query->whereIn('expectations.name', $userSelect); //now chain another query:
        //Passing the function 2 arguments: minimum and maximum values from the view (with 'use').
        })->whereHas('user', function ($query) use ($min,$max)
        {
        $query->whereBetween('age', [$min,$max]);
        })->get();
        //dd($prefQuery);

         if($this->user)
    {

      return view('search', compact('amount','min','max','userSelect'))->with(['user' => $this->user]);
    }
    else
    {
      return redirect('auth/login');
    }
    }
}
