<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HubController extends Controller
{
  public function hub()
  {
    $user = Auth::user();

    if($user)
    {
      return view('hub', compact('user'));
    }
    else
    {
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
  }
}