<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HubController extends Controller
{
public function hub()
{
$profile = Profile::findOrFail($id); // a profile that you know you have recently created without errors
$user = Auth::user();
    if($user)
    {
    return view('hub')->with(compact('user'));
	} else{
		   return redirect('auth/login');
}
/*
public function details()
{

}

public function follow()
{

}
*/
}}