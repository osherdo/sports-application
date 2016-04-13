@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.js') !!}"></script>
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

<!-- Using laravel session -->
@if(Session::has('message')) <!-- Checking if session has a variable called message. -->
<div class="alert alert-info">
<li> {{ Session::get('message') }} </li> <!--if true -print the message from the insert_posts variable. -->
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

<p>Goals: {{ $user->profile->goals }}</p>

{{--
    You can also drill down to the profile's expectations
 --}}

 <p>Expectations</p>
<ul class="profile-list">
  @foreach($user->profile->expectations as $expectation)
    <li class="profile-list-item">{!! $expectation->name !!}</li>
  @endforeach
</ul>

<p><b> this is other users you may want to follow: </br></p>
<ul>
@foreach($mutuals as $mutual)
@if(isset($mutual->user->id))
<!-- hub/{{$mutual->user->id}}
  It goes to the user that matches the value of $mutual criteria. and then it goes and gets its id.This is sent to the controller for further handling.Check page source to see id's numbers. -->
  <!-- In the href - Passing the user to your controller -->
<!-- About URL::to: http://daylerees.com/codebright-url-generation/ -->

  <br><li><a href="{{URL::to('hub', [$mutual->user->id])}}" class="button button-3d" name="make_follow">Follow User</a>
{!! $mutual->user->name; !!}  <!-- I access the user's name property -->

</li>
@endif
@endforeach 
</ul>

  @if(isset($message)) <!-- if the var exist and have a value it would be printed. 
It is used for all the notifications in this page.-->
  {{ $message }}
@endif   
<br> 
<!-- only when a post has been submitted the varible value will show. -->
<!--  telling the form the info go to this route (url). almost equal form action ="samePage" -->
{!! Form::open(['route' => 'createPost','method'=>'post']) !!}
 {!! Form::hidden('post') !!} {{--used for getting the emoticons in the post from the js filer --}}

 {!! csrf_field() !!}
   <div class=contentWrap>
    <!-- id is used for using in status.js file. class is for the css. --> 
    <div id="test" class="test" placeholder="How's your fitness going?..." contenteditable="true"></div>
  </div>
  <div class=icons>
    <img alt="heart" src="http://icons.iconarchive.com/icons/succodesign/love-is-in-the-web/512/heart-icon.png">
    <img alt="food" src="http://icons.iconarchive.com/icons/jamespeng/cuisine/256/Pork-Chop-Set-icon.png">
    <img alt="workout" src="images/post_icons/dumbbell.png">
    <!--add more icons as you wish in this div -->
  </div>
  <button>
    Post to profile
  </button>
  {!! Form::close() !!}

<!-- script to check if user typed anything in the textbox before submit.
  both .text() and .html() return strings. It's testing if the string length is zero.
  trim is for removing whitespaces before and after a string.
  the 'submit' event is needed since it's a submit button.
-->

<div class="own_posts">

<p> here are your latest posts:</p>

@foreach ($get_own_posts as $own_post)

{!! $own_post->full_post !!}<br><br>

@endforeach

</div>
<br><br>
<div class="followees_section">
<p> Posts from people you're following: <p>

<!-- Iterate over the followee's posts with a foreach loop:
  the first parameter the foreach gets is the array expression.
  Second element: On each iteration, the value of the current element (which is a post) is assigned to $value (second element) and the internal array pointer is advanced by one.

  Next: within these: {{-- {!! $post->full_post !!} --}} I access the $key (which is $post) and then access the full_post column in the posts table.
-->
<div class="followee_posts">

@foreach ($get_post_uploader as $name)

@foreach ($get_followee_posts as $post)

{!! $name->name !!} <br><br>
{!! $post->full_post !!} <br><br><hr>

@endforeach
@endforeach
</div>
</div>
@stop