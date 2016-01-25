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
<ul>
@foreach($profile->expectations as $expectation)
    <li>{!! $expectation !!}</li>
@endforeach 
</ul>


            @yield('content')
      