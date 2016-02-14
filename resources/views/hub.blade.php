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
  <li>{!! $mutual->user->name; !!}
</li>
@endforeach 
</ul>
     <div class=contentWrap>
        <div class="test" placeholder="How's your fitness going?..." contenteditable="true"></div>
    </div>
    <div class=icons>
        <img alt="heart" src="http://icons.iconarchive.com/icons/succodesign/love-is-in-the-web/512/heart-icon.png">
    </div>
{!! Form::submit('Post to profile',['class'=>'button button-rounded button-post-to-profile'])!!}


<!-- script to check if user typed anything in the textbox before submit.
  both .text() and .html() return strings. It's testing if the string length is zero.
  trim is for removing whitespaces before and after a string.
  the 'submit' event is needed since it's a submit button.
-->

<script>
$(document).on('click', '.button-post-to-profile', function() {
  var isEmpty = $.trim($('.test').html()).length === 0;
  alert('Is' + (isEmpty ?  '' : ' not') + ' empty.');
});
</script>

@stop

