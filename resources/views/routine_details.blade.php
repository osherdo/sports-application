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




<p>Hello, {{ $user->name }}.</p>

@foreach($user_routine_details as $routine)

  <li>{{$routine->routine_id }} </li> 

@endforeach 