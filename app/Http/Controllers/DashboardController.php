<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

DB::table('users')->get();

  //$users = DB::table('users')->get();

       // return view('dashboard', ['users' => $users]);

    }
}