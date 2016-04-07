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
Here are your search results:<br><br> </p>
<!-- I am echoing data according to the queries done in the controller:
	1) Getting the user name (Querying the users table).
	2) Getting the user age (Querying the profiles table)
	3) Getting the user expectations (Querying the expecations table through the 'Profile' model).

	The Expectations relationship is a many to many so it will be a collection of expectations that will need to be looped through.
-->
<hr>
@foreach($prefQuery as $profile)
<hr>

    {{ $profile->user->username }}
    {{ $profile->age }}
    @foreach($profile->expectations as $expectation)
        {{ $expectation->name }}
    @endforeach
    <hr>

@endforeach

<br><br><br><hr>
@stop