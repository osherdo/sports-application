@extends('layouts.master')
    <meta name="_token" content="{!! csrf_token() !!}"/>

@section('scripts')
<script type="text/javascript">

/* 
Live Binding(for future events): When the browser will detect a class called pickexercise, it'll trigger the function.

This won't work: ( the browser here expects to identify this class on document ready.)
 $('.pickexercise').click(function (event)
  {
      console.log("hello");
    });

*/
  $(document).on('click','.pickexercise', function(event)
  {
    // Getting the neccesary parameters to update to another exercise.

      var current_obj = $(this);

      var new_exercise = $(this).val(); // Getting the current value of the exercise being clicked (which is an id of the exercise).

      var routine = $('.routine').html(); //getting the current routine id. Putting it with .html  (since it's the content of the routine class)  
      //console.log(routine);

      var old_exercise = $(this).attr('id');
      //var token =$('.token').val();

      //alert(new_exercise);
      //alert(old_exercise);

        var counter = localStorage.getItem('counter');

        //alert(counter);

      var old_exercise_obj = $(".exercise-container[data-counter="+counter+"]");

      var new_img = $(this).closest("li").find("img").attr("src");
      var new_desc = $(this).closest("li").find("span").html();
      //alert(new_img);

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });


      $.ajax({
        type: "POST",
        url: "update_routine",
        data: {
          // getting the picked exercise, old exercise and routine id with the variables declared above.
          //'_token':token,
          'chosen_exercise': new_exercise,
          'routine': routine,
          'exercise_to_replace': old_exercise
        },
        success: function (data) {
            console.log("updated");
          //Comment out this line for debugging purposes.
            //window.location.reload();

            console.log(old_exercise_obj);

            old_exercise_obj.find("img:first").attr("src", new_img);
            old_exercise_obj.find(".replaceExercise:first").attr("value", new_exercise);
            old_exercise_obj.find("b:first").html(new_desc);
            old_exercise_obj.attr("data-id:first", new_exercise);

            //current_obj.val(new_exercise);

            $("#myModal").modal("toggle");
        },
        error: function(data)
        { // This is error callback function.Can be written for testing purposes, to see if the ajax function's is being executed well. 
          alert("An error occured.");
        }
      });
   }); 
</script>
<!-- CSRF Token. -->
<meta name="_token" content="{{csrf_token()}}">

<script type="text/javascript">
$(document).ready(function(){ // . is used for class identify. # is for id.
  $('.replaceExercise').on('click', function(e){

    var counter = $(this).closest(".exercise-container").attr("data-counter");
    //alert(counter);

    localStorage.setItem('counter', counter);

    $('.modal-body').html(''); // clear the modal-body each time we're opening the modal-body div.
      var exercise_id = $(this).val(); // Getting the current value attribute of the replaceExercise button (replaceExercise is defined in line 22).
    console.log("Exercise "+exercise_id);

      $.ajax({
          url: 'edit_routine',
          type: "POST",
          data: {'exercise_id':exercise_id}, // First parameter is a name given for the data. Second parameter (exercise_id) is the variable declared above (value).
          success: function(data){
            console.log(data);
            var count;
            // Accessing the data in this format: Access of index and then accesing its key (which could be (in this instace, take from exercises table: id, image_path etc).
            for(count  = 0; count < data.length; count++)
            {

              var name= data[count].name; // Accessing the data object,than accessing the current count of the iteration (first is 0). Then accessing the name property in the Exercise model. The name is accessed throught the data parameter.
              var id= data[count].id;

              var image_path= data[count].image_path;
              //console.log(location.origin);
              image_path = location.origin + '/images/' + image_path;
              element = '<li>';
              /*
              if(count==0)
              {
                element+='<input type="hidden" class="token" id="token" value="{{ csrf_token() }}”>';
              }
              */

              element += '<img src='+image_path+'>';
              element+= '<span>' + name + '</span>';
              // check if the exercise id number is NOT equal to the current picked exercise_id, so we could show the pick exercise buttton to the different exercises and not the same one.
              if(id != exercise_id){ 
                // Getting the old exercise id, and in the value attribute we're getting the new id of the new exercise picked. 
                element+= '<button class="pickexercise" id='+exercise_id+' type="submit" value="'+id+'">Pick this exercise</button>'; 
              }
              // Catch the id of the exercises, when you click the button.
              element+= '</li>';
              //console.log(name); // showing the exercises name of the picked exercise mutual category.
              //console.log(element);

              $('.modal-body').append(element); // replace the entire modal-body div with the element contents we are passing.

            }           
        }
      });

  });
});
</script>

<!-- Saving the replacement exercise to the server. -->
<script type="text/javascript">
// Should be triggered only once when clicking on "Replace this exercise".
 

</script>

<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>

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
<div class="routine" style="visibility:hidden">{{ $routine }}</div>
<!--<script></script> !--><!-- $routine represents the current routine id taken from the details() function in the controller.
 <!-- getting the current routine id from the details() function in the controller. -->
<div class="panel-group" id="accordion">

 <?php $accordion_count = 0; ?> <!-- $accordion_count is used to iterate over accordion collapse divs (generated with a foreach (the divs)) -->
 <!-- 
 'abdomnials'
    [0]=>exercise_name,
    [1]=>exercise_name, 
  biceps
    [0]
    [1]
    [2]
  -->

    <?php $counter = 0; ?>

@foreach($list_of_exercises as $category_name=>$exercise) {{--$exercise is getting values of the $list_of_exercises by their category name. $exercises is just a placeholder is this case. --}}
<div class="panel panel-default">
    <div class="panel-heading">
  <h4 class="panel-title">
   <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $accordion_count; ?>"> <!-- Echoing the current $accordion_count value. -->
        {{ $category_name }} </a>
      </h4>
    </div>
      <div id="collapse<?php echo $accordion_count; ?>" class="panel-collapse collapse in"> <!-- attaching the current accordion_count value to the collapse name (collapse1,collapse2,etc...) -->

  @for($x = 0; $x < count($exercise); $x++) <!-- we're iterating over exercises categories avobe. Now we're iterating over their individual exercises -->

    <div class="exercise-container" data-id="{{ $exercise[$x]['id'] }}" data-counter="{{$counter}}">
       <img src="{{ asset($exercise[$x]['image_path']) }}" />
      <b>{{ $exercise[$x]['exercise_name'] }}</b>
      <!-- Button trigger modal -->
<button type="button" id="replaceExercise" value="{{ $exercise[$x]['id'] }}" class="btn btn-primary btn-lg replaceExercise" data-toggle="modal" data-target="#myModal">
  Replace this exercise
</button>

</div>

     <!-- Iterating over the number of exercises the catergory (above) have, and going out once finised.Then increasing the number of $accordion_count.--> 

      <br/>

    <?php $counter++; ?>

  @endfor
      </div>

</div>
<?php $accordion_count++; ?>
@endforeach 



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="container">

