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