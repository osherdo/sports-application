@extends('layouts.master')

@section('content')
    {!! csrf_field() !!}
<html>
    <body>
    <div class="form-group">
    	<h1>Welcome to Click-and-Fit Dashboard! </h1>
    	<h2><strong>Let's Create your gymnast profile:</strong></h2>
   
        {!! Form::open(['url'=>'profiledata']) !!}
        <p> A)&nbsp I am a: &nbsp{!! Form::radio('ActivityType',null,['class'=>'form-control']) !!} Male
 &nbsp{!! Form::radio('ActivityType',null,['class'=>'form-group']) !!} Female

 <br><br> B)&nbsp My Age is:
 {!! Form::number('name', 'value'); !!}


        <p> C)&nbsp What are your fitness goals for the next year?<br></p>
{!! Form::textarea('notes', 'By default,other users can see your goals.',['class'=>'form-control', 'maxlength'=>100]) !!}</p> <!--default is null -->
<p> D)&nbsp I am better in:</p>
 &nbsp&nbsp&nbsp{!! Form::radio('ActivityType',null,['class'=>'form-control']) !!}  Aerobics
 &nbsp{!! Form::radio('ActivityType',null,['class'=>'form-control']) !!} Anerobic
 &nbsp{!! Form::radio('ActivityType',null,['class'=>'form-group']) !!} I am pretty good at both <br><br>
 
 E) What do you expect from this app to help you? <br><br> (You can always change this later) <br><br>
 &nbsp{!! Form::checkbox('improve','New anerobic routines'); !!} Find new anerobic routines <br>
 &nbsp{!! Form::checkbox('improve','New aerobic routines'); !!} Find new aerobic routines <br>
 &nbsp{!! Form::checkbox('improve','Follow'); !!} Follow other users to get inspired <br>
<br><br>
{!! Form::submit('Create Profile',['class'=>'form-group']) !!}
</div>

        {!! Form::close() !!}
    </body>
</html>

@stop
  <div class="container">
            @yield('content')
        </div>