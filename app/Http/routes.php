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
	
// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
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

Route::get('hub/{user_id}','HubController@add_followee')->name('follow');
// telling laravel there's a paramter (variable) in the uri that's called user_id and follow.
// hub/{user_id} is needed to pass the user id to the controller.
// 'follow' - I have chained the route's name to the end. it can be used as shorthand for writing the route path.
// In the view: instead : 'hub/user/1' you can use {{route('follow')}} 
// In the controller: redirect('hub/user/o1') I can do this: redirect()->route('follow')
/*
//creating 2 routes under one group that should be authenticated.
Route::group(['middleware' => 'auth'] ,function(){
    Route::post('search','SearchController@query')->name('search'); // route for name/user search
    //Route::post('search_multiple','SearchController@multiSelect')->name('multi_search');	
    Route::post('search_multiple', 'SearchController@multiSelect')->name('multi_search');

    // url's will be accessible only from a registered user.
});
*/

 Route::post('search','SearchController@query')->name('search'); // Route for name/user search.
   
 Route::post('search_multiple', 'SearchController@multiSelect')->name('multi_search');

 Route::get('personal/{slug}','IdController@get_details')->name('personal'); // 'personal' has a parameter called {slug} that does representation of the value.We're passing it in the named route.(search.blade.php)

 Route::get('follow/{id}','IdController@follow_current')->name('personal_follow');

 Route::get('unfollow/{id}','IdController@unfollow_current')->name('personal_unfollow');

 Route::get('routine','RoutineController@save')->name('create_routine');

 //Route::get('edit_routine','RoutineController@edit')->name('edit_routine');

 Route::get('view_routine','RoutineController@view_routine')->name('view_routine');

 Route::post('save_routine','RoutineController@save')->name('save_routine');

 Route::get('oop','OopController@view'); // Practicing OOP.
