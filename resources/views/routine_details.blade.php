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

<!-- Key is: category_name and Value is $exercise array (using the foreach loop with associative array). --> 
<div class="panel-group" id="accordion">

 <?php $accordion_count = 0; ?> <!-- $accordion_count is used to iterate over accordion collapse divs (generated with a foreach (the divs)) -->
 'abdomnials'
    [0]=>exercise_name,
    [1]=>exercise_name, 
  biceps
    [0]
    [1]
    [2]
@foreach($list_of_exercises as $category_name=>$exercise) {{--$exercise is getting values of the $list_of_exercises by their category name. $exercises is just a placeholder is this case. --}}
<div class="panel panel-default">
    <div class="panel-heading">
  <h4 class="panel-title">
   <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $accordion_count; ?>"> <!-- Echoing the current $accordion_count value. -->
        {{ $category_name }} </a>
      </h4>
    </div>
      <div id="collapse<?php echo $accordion_count; ?>" class="panel-collapse collapse in"> <!-- attaching the current accordion_count value to the collapse name (collapse1,collapse2,etc...) -->

  @for($x = 0; $x < count($exercise); $x++) <!-- we were iterating over exercises categories avobe. Now we're iterating over their individual exercises -->
       <img src="{{ asset($exercise[$x]['image_path']) }}" />
      <b>{{ $exercise[$x]['exercise_name'] }}</b>
     <!-- Iterating over the number of exercises the catergory (above) have, and going out once finised.Then increasing the number of $accordion_count.--> 

      <br/>
  @endfor
      </div>

</div>
<?php $accordion_count++; ?>
@endforeach 

<div class="container">


