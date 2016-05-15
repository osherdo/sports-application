@extends('layouts.master')
@section('scripts')
@stop

@section('content')
    {!! csrf_field() !!}

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



{{--
   You have a $user variable available
    representing the current Auth::user();
--}}

<p>Hello, {{ $user->name }}.</p>

{{--
    This user has a profile whose properties you can also display
 --}}
<!--
<p>Welcome to your active routines page: {{ $user->profile->goals }}</p>

{{--
    You can also drill down to the user's routines.
 --}}

 <p>Your Routines:</p>
<ul class="routines-list">
  @foreach($user->profile->expectations as $expectation)
    <li class="routines-list-item">{!! $expectation->name !!}</li>
  @endforeach
</ul>
-->
@foreach ($all_routines as $routine) 

    <li><a href="/routine_details/{{$routine->id}}">{{$routine->routine_name}}</a></li>
    {{-- Getting the routine id numbr is done through this: {{$routine->id}} , There's a placeholder for the number in routes.php. --}}
    <br />




@endforeach