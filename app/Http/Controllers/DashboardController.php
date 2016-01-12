<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller 
{
    public function dashboard()
    {
        return view('dashboard');
        //if (Auth::check()) { }
        // The user is logged in...

    }   
    public function store()
    {
    	
    //Taking the form data and insert it to the database and then redirect me to somewhere else.
    	//$input=Request::all();
    	//return $input;


  //$users = DB::table('users')->get();

       // return view('dashboard', ['users' => $users]);

    }
    public function retrieve()
    {
    $user = Auth::user(); // User is being authenticated.
if($user){
return $user->name;
}
else{
return redirect('auth/register');
}
    }
}