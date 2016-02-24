<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('homepage');
});
	
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::post('dashboard','UserProfilesController@store');
Route::get('dashboard','DashboardController@retrieve');

Route::get('hub','HubController@hub');
Route::post('hub','HubController@insert_posts')->name('createPost'); //name->(createPost)-Chain the name method(and definition) onto the end of the route definition.
//The name chaining is good since by this I can access the route easier in the view.
// e.g. (in the view): <form action="{{ route('createPost') }}" method="post">

//Route::get('hub','HubController@details'); //load profile details to a nice viewing.
//Route::post('hub','HubController@follow'); //Store selected users to follow.

Route::get('hub','HubController@followee_post'); 


Route::get('oop','OopController@view'); //practicing OOP.