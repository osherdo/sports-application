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
}