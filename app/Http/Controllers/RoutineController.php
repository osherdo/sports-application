<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Expectation;
use App\Routine;
use Input;

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

/*
public function create(Request $request)
{

  // Retrieve exercises
  $exercises = \App\Exercise::all();

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

return view('routine', [
  'user' => $user,
  'exercises' => $exercises
]);

}
*/

  public function save() {
    
    //$exercise_ids = $request->input('routine'); // [1,2,3,4,5] // array of excercise ids

    

    //$exercise_ids = $request->input('routine'); 

    //$routines= Input::['routine'];

    //create a routine first then attach it to exercise e.g
    // this is not working: $exercise_ids = $request->input('routine'); (braces error)
    //$routines = $request->input('routine');  // Can be used as well, in this case.
    $user = Auth::user();

    $input = Input::get('routine');
    //dd($input);
    //$routine = Routine::create($input);

    $routine = Routine::create(Request::all());


    // get $exercise_id that you want to associate with this routine.
    $routine->exercise()->attach($exercise_id);
    // Attach the user to the routine 
    $routine->user()->attach($user_id );



    foreach($routine as $routine_id) 
    {
    // 1- process img upload to your server

    // 2- create Picture
    $exercise = new Exercises;
    $exercise->image_path = $img;
    $exercise->save();

    }



    $routine = Routine::create($routine);

    return redirect ('view_routine')->with(['user' => $this->user],'routine');


    // Update the routine_id with the new routine created.
    //$insert= $this->user->routine()->attach($routine_id)

    // TODO: Osher: write code to create a Routine 
    // + associate Exercises (using the IDs we received
    // from the browser, see $excercise_ids)

    // $routine = new Routine(); // create an empty routine

    // Add the exercises to the routine (lookup the id first)
    // 
    // foreach $exercise_ids as $exercise_id:
    //
    //   $exercise = Exercise::where('id', $exercise_id)->get(); // get the exercise by id
    //
    //   $routine->exercises->add($exercise); // add it to the routine (relationship exercises)
    //
    // $routine->save(); // save to the database

    // Later after saving the routine - access the routine details with something like this (not final): $this->user()->routine->exercises::All;


    // TODO: Osher: instead of die(), 
    // redirect to show the routine (show_routine/view_routine)
    
  }

}