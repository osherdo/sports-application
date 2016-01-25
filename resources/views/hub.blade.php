@extends('layouts.master')

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
    I don't know what you want to display here, but you have a $user variable available
    representing the current Auth::user();
--}}

<p>Name: {{ $user->name }}</p>

{{--
    This user has a profile whose properties you can also display
 --}}
<p>Goals: {{ $user->profile->goals }}</p>


{{--
    You can also drill down to the profile's expectations
 --}}
 <p>Expectations</p>
<ul>
  @foreach($user->profile->expectations as $expectation)
    <li>{!! $expectation->name !!}</li>
  @endforeach
</ul>