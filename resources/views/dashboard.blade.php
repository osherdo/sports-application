@extends('layouts.master')

@section('content')
    {!! csrf_field() !!}

    <body>
    <div class="form-group">
    	<h1>{{ $user->name }}, Welcome to Click-and-Fit Dashboard! </h1>
    	<h2><strong>Let's Create your gymnast profile:</strong></h2>

        {!! Form::open(['url'=>'/dashboard']) !!} 

        <p> A)&nbsp I am a: &nbsp{!! Form::radio('gender',null,['class'=>'form-control']) !!} Male
 &nbsp{!! Form::radio('gender',null,['class'=>'form-group']) !!} Female

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

 <br><br> B)&nbsp My Age is:

{!! Form::number('age', null) !!}


        <p> C)&nbsp What are your fitness goals for the next year?<br></p>
{!! Form::textarea('goals','By default,other users can see your goals.',['class'=>'form-group', 'maxlength'=>100]) !!}</p> <!--default is null -->
<p> D)&nbsp I am better in:</p>
 &nbsp&nbsp&nbsp{!! Form::radio('activityType','Aerobics',null,['class'=>'ActivityType']) !!}  Aerobics
 &nbsp{!! Form::radio('activityType','Anerobic','null',['class'=>'ActivityType']) !!} Anerobic
 &nbsp{!! Form::radio('activityType','both',null,['class'=>'ActivityType']) !!} I am pretty good at both <br><br>
 
 E) What do you expect from this app to help you? <br><br> (You can always change this later) <br><br>
 &nbsp {{-- {!! Form::checkbox('expectations[]','New anerobic routines',true); !!} --} Find new anerobic routines <br>
 &nbsp {--  {!! Form::checkbox('expectations[]','New aerobic routines',true); !!} Find new aerobic routines <br> 
 &nbsp{!! Form::checkbox('expectations[]','Follow',true); !!}  Follow other users to get inspired <br> --}}
<br><br>

@foreach($expectations as $expectation)
    {!! Form::checkbox('expectations[]', $expectation->id,true) !!} {!! $expectation->name !!}<br>
@endforeach 

<ul>
@foreach($profile->expectations as $expectation)
    <li>{!! $expectation !!}</li>
@endforeach 
</ul>

{!! Form::submit('CreateProfile',['class'=>'form-group']) !!}
</div>
        {!! Form::close() !!}
        
    </body>
@stop

