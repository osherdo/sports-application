<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User; // Import the User Model to the controller.


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
    	dd($request);
    	 // Querying 2 columns: 'username' and 'name' (chaining the search on username column:);

    	return view('search',compact('user','userInput'));

    	//  make the query with a where clause.
    }

    protected function multi_select(Request $request)

    {
        $user = $request->user();
        $userSelect = $request->get('select_preferences');
        dd($userSelect);

    }
}
