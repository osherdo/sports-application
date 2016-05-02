<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Expectation;

class RoutineController extends Controller
{

  protected $user;


public function __construct() 
{ 
// Constructor for checking user's auth after a while.
  

    $this->middleware('auth');
    if (!Auth::check()) { return redirect('auth/login'); }

    $this->user = Auth::user(); // Auth method always use User.php model. (shown in config/auth.php)
    // Now we can call the user in other methods when we need to call the user.
    $expectations_list=expectation::all();
    view()->share('expectations_list',$expectations_list);
}

public function create(Request $request)
{
	$user = Auth::user();
  /*
  $routine = $user->profile()->create
  ([
    'name'=>$request['routine_name'],
    'type'=> Input::get['type'],
    'aerobic'=>$request['routine[]'],
    'anaerobic'=>$request['routine[]'];
  ]);
    
  dd($routine);

	//return view('routine')->with('user')->first;
*/
return view('routine',compact('user'));

}

}
