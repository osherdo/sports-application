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
    $expectations = Expectation::all();
    $user = Auth::user();

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