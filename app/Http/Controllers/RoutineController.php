<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Expectation;
use App\Routine;
use Input;
use App\Exercise;
use App\ExerciseRoutine;

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


public function index()
{
  $user=Auth::user();
  $exercises = Exercise::all();

  return view('routine',compact('user','exercises'));
}

public function create()
{

    $user = Auth::user();

    $user_id=Auth::user()->id;

    $input = Input::get('routine');

    $routine = new Routine; // Creating A new object called Routine, coming from a eloquent model called Routine.php.
    //$routine->routine_name = "Routine Name"; // Hardcoded.
    $routine->routine_name = Input::get('routine_name'); // Dynamically got.
    //$routine->routine_type = "aerobic"; // Hardcoded.
    $routine->routine_type = Input::get('type');
    $routine->user_id = $user_id; // getting the id from the $user_id variable.
    $routine->save(); // Inserting the record inside the table.
    echo $routine->id; // Show the routine id in the view_routine view (After submission).

    //dd($input);
    //$routine = Routine::create($input);
    //dd($routine);
    
    foreach($input as $exercise)
    {
          $exerciseRoutine = new ExerciseRoutine;
          $exerciseRoutine->user_id = $user_id;
          $exerciseRoutine->routine_id = $routine->id;
          $exerciseRoutine->exercise_id = $exercise;
          $exerciseRoutine->save();  // save to the exercise_routines database.
    }
/*
    // this for loop is an alternative to the foreach.

     for($i = 0; $i < count($input); $i++)
      {
         $exerciseRoutine = new ExerciseRoutine;
          $exerciseRoutine->user_id = $user_id;
          $exerciseRoutine->routine_id = $routine->id;
          $exerciseRoutine->exercise_id = $input[$i];
          $exerciseRoutine->save();
      }
      */
    
    //dd($routine);
    //$routine = Routine::create(Request::all());
    //dd($input);

    // Attach one user to one routine.
    //$routine->users()->attach($user_id );

/*
    foreach($routine as $routine_id) 
    {
    // 1- process each img upload to your server.
    

    // get $exercise_id that you want to associate with this routine.

    $routine->exercise()->attach($exercise_id);

    // 2- create Picture
    $exercise = new Exercises;
    $exercise->image_path = $img;
    $exercise->save();

    }

    $routine = Routine::create($routine);
*/

    //return redirect ('routine_list')->with(['user' => $this->user],'routine','exercise_id','user_id');;

  


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

}

public function routine_list()
{
  $user=Auth::user();
   
   // Retrieve exercises
  $all_routines = \App\ExerciseRoutine::all();
  dd($user_routine_list);
  $user_routine_list =

  return view('view_routine',compact('user_routine_list','$all_routines');
  }

}
