<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserProfilesController extends Controller
{
    protected function store(Request $request) //That's request object.
    {
        $user = Auth::user();

        // A profile belongs to a user
        $profile = $user->profile()->create([
            'name' => $request['name'],
            'age' => $request['age'],
            'goals' => $request['goals'],
            'activityType' => $request['activityType']
        ]);

        $profile->expectations()->attach($request->expectations);

        return redirect('hub');  // this is where you redirect to the hub after you store the User.
    }
   

}

