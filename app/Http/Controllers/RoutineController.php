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
    //echo $routine->id; // Show the routine id in the view_routine view (After submission).

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

     return redirect('view_routine');
    

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


}

public function routine_list()
{
  $user=Auth::user();
  
    // Retrieve exercises
  //Auth::user()->id
  $all_routines = Routine::where('user_id',Auth::user()->id)->get();
  //dd($all_routines);
  //$user_routine_list =

  return view('view_routine',compact('all_routines','user'));
  }

  public function details ($routine) // Getting the routine id number from the view.$routine is a placeholder.
  {

    $exercises_routines=ExerciseRoutine::where('routine_id',$routine)->where('user_id',Auth::user()->id)->orderBy("id", "DESC")->get(); // Ordering the exercises by their id's, for better sorting in the view.
  // TO DO : 
    // if (count($exercises_routines == 0){echo "no exercises found"})
//SELECT * FROM exercises_routines WHERE routine_id= 30
    $exercises_in_routine = array();
    $count = 0;
    foreach($exercises_routines as $single_routine)
    {
      //echo $single_routine->exercise_id; accessing the ExerciseRoutine , and get the exercise id's associated with the current routine.
      
      $exercise_id = $single_routine->exercise_id; //So far we accessed the routine_id column. Now we're assigning all the exercises id's to the $single_routine.and now it has all its exercises. 
      $exercise =Exercise::find($exercise_id); // Accessing the Exercise Model, and looking for those exercises we're looking for, and making a match (for each loop - for one exercise only).
      //Select * from exercises where id  = 11
      $exercises_in_routine[$count]['id'] = $exercise->id; // for each loop, we're getting the exercise id of that loop. We found the exercise through the Exercise model.
      $exercises_in_routine[$count]['exercise_name'] = $exercise->name; //for each loop, we're getting the exercise name of that loop.
      $exercises_in_routine[$count]['image_path'] = "images/".$exercise->image_path; //for each loop, we're getting the exercise image_path of that loop.
      $exercises_in_routine[$count]['category'] = $exercise->category; //for each loop, we're getting the exercise category of that loop.
      $count++; // Insert it all in the array ,as done above. and then iterate again, and add 1 to the count.
      
    }
//Todo : Ask Karthik if there is a better way to bring details.
    /*
   echo "Print Exercises in routin";
   echo "<pre>";
       print_r($exercises_in_routine);
       echo "<pre/>";  
    */

// Arranging the array in form of categories:

    $exercise_category = array();  //Stores the exercise category.
    $list_of_exercises = array();  //Stores exercises but ordered by a category.

    for($x=0; $x<count($exercises_in_routine); $x++)
    {
      $category = $exercises_in_routine[$x]['category']; // Get the current exercise category, from the foreach loop above (it's a value that we get there)
      // We're accessing a property called 'category'.
      if(!in_array($category, $exercise_category))
      {
        //If category is not inside the array - create a new key
        $list_of_exercises[$category][0]['exercise_name'] = $exercises_in_routine[$x]['exercise_name']; // We're accessing again the array above and getting the exercise_name there, and assigning it to the new array name.
        // We're using here an asssociative array, so we're assigning a value to the key 'exercise_name' in this array.
        $list_of_exercises[$category][0]['image_path'] = $exercises_in_routine[$x]['image_path']; // Same thing goes here, like with exercise_name one line above.
        $list_of_exercises[$category][0]['id'] = $exercises_in_routine[$x]['id'];  // Same thing goes here, like with exercise_name 2 lines above.

        array_push($exercise_category, $category); //Push the category to exercise category
      }
      else
      {     // exercise_name and image_path and id are all used for the array.
        $count = count($list_of_exercises[$category]); // Gives count of array elements in php. we're counting the exercises of the same category, so it could increase the index number by one each time.
        $list_of_exercises[$category][$count]['exercise_name'] = $exercises_in_routine[$x]['exercise_name']; //If we already have the category name in the TRUE condition above, we're trying to get the rest of the exercises of the same group.

        $list_of_exercises[$category][$count]['image_path'] = $exercises_in_routine[$x]['image_path']; // Trying to get the image_path of the image from the same category we're on now (stored in $category). Also getting the current count value.
        $list_of_exercises[$category][$count]['id'] = $exercises_in_routine[$x]['id'];  // Trying to get the id of the image from the same category we're on now (stored in $category). Also getting the current count value.
      }
    }

   // dd($list_of_exercises);

return view('routine_details',compact('user','exercises_routines','routine','list_of_exercises','count'));


  }

  public function edit_routine(Request $request)
  {
    $exercise = Exercise::find($request->exercise_id); // exercise_id is taken from the jquery code (it's a variable there).

    // find() equals to select * from exercises where id is the same as given in the value attribute.
   // dd($exercise->category);
    $ajax_exercises = Exercise::where('category',$exercise->category)->get(); // Getting all the exercises belongs to the same category like the one being replaced now.

    
   return $ajax_exercises; // Store the $exercise variable into the data parameter of Ajax call. (Can be viewed in the browser's console)
  }

  public function update(Request $request)
  { 
    
    // What we need to achieve:
    //UPDATE  `exercise_routines` SET  `exercise_id` =31 WHERE  
    //`exercise_id` =35 AND  `routine_id` =57

    // Determining the current routine id, that's attached to the current user.

     /*  Requesting the current routine id from the javascript file in the view (starting from this line:
      $(document).on('click','.pickexercise', function(event)) by getting the value of the routine variable. (it is passed from there in a JSON format).
      */
     // dd($request);
    //dd($request->routine); // can be seen in the Network tab, in the inspector tools.
    $current_routine = ExerciseRoutine::where('routine_id',$request->routine)->where('exercise_id',$request->exercise_to_replace)->first(); // Getting only the first elemtn from the request to replace.

    $current_routine->exercise_id = $request->chosen_exercise;
    $current_routine->save(); 
     // getting the current routine_id and the exercise to replace. and replace it with the chosen exercise.
    // All this data is transferred to the controller using the POST request we're making from the script in the view.
   
   // dd($current_routine);

  }

  

}
