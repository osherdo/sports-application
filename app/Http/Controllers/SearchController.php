<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    protected function query()
    {
    	$user = $request->user(); // Grab the authenticated user for the request. and store it in $user.
    	$userINput= $request->idOfSearchInput;
    	$UserNameQuery = User::Where('name',$UserInput)->get;
    	// Look for the user.

    	//  make the query with a where clause.
    }
}
