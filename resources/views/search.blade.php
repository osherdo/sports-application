@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>
@stop

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 {!! csrf_field() !!}


<p> {{ $user->name }}, Welcome to the search page:<br><br>
<!-- I am echoing data according to the queries done in the controller:
	1) Getting the user name (Querying the users table).
	2) Getting the user age (Querying the profiles table)
	3) Getting the user expectations (Querying the expecations table through the 'Profile' model).

	The Expectations relationship is a many to many so it will be a collection of expectations that will need to be looped through.
-->
<hr>
@if(isset($prefQuery))
<!-- Shown when using the prefrences search. -->
<p> Here are you preferred users. </p>
@foreach($prefQuery as $profile)
<hr>
 <!-- Accessing the profile model - then the relationship with the user associated with it. then the column username. -->
   <a href="{{ URL::route('personal',[$profile->user->username]) }}" class="">{{ $profile->user->username }}</a>  
    {{ $profile->age }}
    @foreach($profile->expectations as $expectation)
        {{ $expectation->name }}
    @endforeach
    <hr>
@endforeach
@endif

@if(isset($UserNameQuery))
Here are your search results:<br><br> </p> <!--Being shown only for the regular search -->

@foreach ($UserNameQuery as $user) {{--$user is the obvious result to echo. Could be named $result or whatever name that makes sense for this instance.--}}
<hr>
{{ $user->name}} {{--Accessing the User model being queried. then the 'name' column in the users table associated with it. --}}
{{ $user->profile->age }} {{-- Accessing the User model being queried.Then accessing the profile() function in the user model (A user can have one profile). then accessing the 'age' column that's in the profiles table (that is associated with Profile model).--}}
{{ $user->profile->goals }}
{{ $user->profile->activityType }}
<!-- this is html comment php will run here so a variable name throws error this will come in html -->

{{-- this is laravel comment similiar to /* in php this didnt
	<br><li><a href="{{URL::to('hub', [$result->id])}}" class="button button-3d" name="make_follow">Follow User</a>
<hr>
{{ $result->user->username}}
{{ $result->profile->age }}
{{ $result->profile->goals }}

<br><li><a href="{{URL::to('hub', [$result->user->id])}}" class="button button-3d" name="make_follow">Follow User</a>
--}}
@endforeach
@endif
@stop