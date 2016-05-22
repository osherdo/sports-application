@extends('layouts.signup-in')

@section('content')

<div class="form-group">
    <h1>{{ $user->name }}, Welcome to Click-and-Fit Dashboard! </h1>
    <h2><strong>Let's Create your gymnast profile:</strong></h2>

    {!! Form::open(['url'=>'/dashboard']) !!}

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

    <p>
        A) I am a:
        {!! Form::radio('gender','male',['class'=>'form-control']) !!} Male
        {!! Form::radio('gender','female',['class'=>'form-group']) !!} Female
        <!-- you have got to associate a value with the gender input -->
    </p>

    <p>
        B) My Age is:
        {!! Form::number('age', null) !!}
    </p>

    <p>
        C) What are your fitness goals for the next year?<br>
        {!! Form::textarea('goals',null, ['class'=>'form-group', 'maxlength'=>100, 'placeholder'=>'By default,other users can see your goals.']) !!}
    </p> <!--default is null -->
    <p>
        D) I am better in:
        <br>{!! Form::radio('activityType','Aerobics',null,['class'=>'ActivityType']) !!}  Aerobics
        <br>{!! Form::radio('activityType','Anerobic','null',['class'=>'ActivityType']) !!} Anerobic
        <br>{!! Form::radio('activityType','both',null,['class'=>'ActivityType']) !!} I am pretty good at both
    </p>

    <p>
        E) What do you expect from this app to help you?

        @foreach($expectations as $expectation)
            <br>{!! Form::checkbox('expectations[]', $expectation->id,true) !!} {!! $expectation->name !!}
        @endforeach
    </p>

    {!! Form::submit('CreateProfile',['class'=>'form-group']) !!}
    {!! Form::close() !!}
</div>

@stop

