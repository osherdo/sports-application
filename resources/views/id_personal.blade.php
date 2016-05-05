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
<!-- $username is passed from the controller. -->
<p> {{ $user->name }}, Welcome to {{ $username->username }} page:<br></p>
<p> Full name: {{$username->name }}.</p>
<hr>
<!--  Get the id's expectations.-->
 <p> Expectations:
@foreach($username->profile->expectations as $exp)
	{{$exp->name}}
@endforeach
</p>
<!-- getting the user that matches $username query and finding it id in the 'id' column. -->
<br><li><a href="{{URL::route('personal_follow',[$username->id])}}" class="button button-3d" name="make_follow" onclick="">Follow {{ $username->username }} </a></li>
<br>

<li><a href="{{URL::route('personal_unfollow',[$username->id])}}" class="button button-3d" name="unfollow"> Unfollow {{ $username->username }} </a></li>

@if(Session::has('message')) <!-- Checking if session has a variable called message. -->
<div class="alert alert-info">
<li> {{ Session::get('message') }} </li> <!--if true -print the message from the notify variable. -->
</div>
@endif

@foreach($username->followee() as $follower)
test
{{$follower->username}}
@endforeach
@stop {{-- ending the current section (content) --}}