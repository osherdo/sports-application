<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Expectation;

class DashboardController extends Controller
{

  public function retrieve()
  {
    /*
    $expectations = Expectation::all(); will get all of the Expectation options in the expectationstable - 
    you need to pass a variable to the view with these expectations in order to create the checkboxes. 
    The beauty of this approach is you can easily add or delete expectations without touching your code - just add/edit/delete on the expectations table.
    */
    $user = Auth::user();
    if(isset($user->profile->id)){
      return redirect()->to('hub');
    }
    $expectations = Expectation::all();
    

    if($user)
    {
      return view('dashboard', compact('user','expectations'));
    }
    else
    {
      return redirect('auth/login');
    }
  }
}