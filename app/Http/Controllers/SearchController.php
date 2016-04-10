<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User; // Import the User Model to the controller.
use Input;
use App\Profile;
use App\Expectation;


class SearchController extends Controller
{
	public function __construct() { // Constructor for checking user's auth after a while.

    $this->middleware('auth');
    if (!Auth::check()) 
    	{ 
    		return redirect('auth/login'); 
		}

    $expectations_list= Expectation::all(); // Expecation is the model that leads to the expecations table. Then I can access all columns and rows.
    view()->share('expectations_list',$expectations_list); // expecations_list is being shared in the view. Then the view extends the master page and it would be available there too. 
    // share is like with() - but with() cannot be used unless a view is returned.
    $this->user = Auth::user(); // Auth method always use User.php model. (shown in config/auth.php)
    // Now we can call the user in other methods when we need to call the user.
} 
    protected function query(Request $request) // search is the named route.
    // Then post input is saved to the $request object.

    {
        $user = $request->user(); // Grab the authenticated user for the request. and store it in $user.
        $userInput= $request->get('NameUser'); // id of input type text.
        // Querying 2 columns: 'username' and 'name' (chaining the search on username column:);
        $UserNameQuery = User::where('name',$userInput)->orWhere('username', $userInput)->get(); 
        //dd($UserNameQuery);

      return view('search',compact('user','userInput','UserNameQuery'));

    	
    }

    public function multiSelect(Request $request)

    {
        $amount = Input::get('amount'); // First getting the age range from the input in html (name="amount").
        $amount = str_replace(' ','',$amount); // Remove the blank spaces between the ages value, if there's any.
        $amount = explode('-',$amount); // is breaking the value 16-45, as 16 and 45, '-' being the breaking point. And finally turns the value into array.
        // Getting the array value as index 0 and 1.
        $min = $amount[0];
        $max = $amount[1];
        //dd($amount); // getting the age range.
         
        $user = $request->user();
        $userSelect = Input::get('select_preferences');
        //dd($userSelect); // Getting user selection.
        /*
        // Chain 2 queries: find both same expectations and same age range.
        //pass in the $userSelect variable into the closure (with use).
        // I can query the expectations table since: A profile has one or more expectations.
        // First access the expectations tabel and then the column (in the query itself).
*/
        
         $prefQuery = Profile::whereHas('expectations', function($query) use($userSelect) {
        $query->whereIn('id', $userSelect); // First Query: compare the name column in expectations table with the user selection.

        //now chain another query:
        })->whereBetween('age', [$min,$max])->get();   //Passing the function 2 arguments: minimum and maximum values from the view (with 'use').

        //return $prefQuery; // Return in json format.
        //return $request->all(); // return all vars associated with the current request you're making.(here's the request is the search you're making).
        //dd($prefQuery);

        if($this->user)
    {

      return view('search', compact('prefQuery','amount','min','max','userSelect'))->with(['user' => $this->user]);
    }
    else
    {
      return redirect('auth/login');
    }
    }
   
}
