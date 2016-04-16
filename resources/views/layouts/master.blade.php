<!DOCTYPE html>
<html lang="en">
<head>
   <!--For Bootstrap mobile proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="/js/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" >
    @yield( 'scripts')
    <title>Sports App @yield('title')</title>
</head>

<meta charset="utf-8">

<body>
    @section('sidebar') Maser Page content demo @show
    <div class="container">
<div class="col-sm-4">
 <form action="{{ route('search') }}" method="post" >
  <!--the form action is the method in a route called search -->
  {!! csrf_field() !!} 
  <div class="search_box_area col-xs-12 pagination-centered">
   <div class="col-sm-4"> 
   <input type="text" placeholder="Search for name/user..." required name="NameUser"> 
    <input type="submit" name="searchButton" value="Search" class="button button-circle button-flat-action">
   </div>
  </div>
 </form>
</div>
<div class="col-sm-8">
  &nbsp; Or:
{!! Form::open(array('route'=>'multi_search'))!!}
  {!! csrf_field() !!} 

  <div class="second_select col-sm-6">
   <!-- preferences search: -->
   <select id="select_preferences" name="select_preferences[]" multiple="multiple"> <!-- using [] to return multiple options and make the select an array. -->
           
    @if(isset($expectations_list))
    @foreach($expectations_list as $exp)
    <option value="{{$exp->id}}" class="options">{{$exp->name}}</option>
    @endforeach
   @endif
   </select>
  </div>
  <!-- html code for age-range selector -->

  <div class="col-sm-6">
   <div id="range-div" class="hide">
   </div>
   <div id="range-options" class="hide-2">
    <label for="amount">within the ages:</label>
    <br><br>
    <input id="amount" name="amount"> <!-- Getting the ages to later be used in the controller (using the name attribute) -->

    <input type="submit" name="2ndsearchButton" id="submitMultiSearch" value="Search" class="button button-circle button-flat-action">

   </div>
  </div>

{!! Form::close()!!}
</div>
        @yield('content')

</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap-multiselect.js')}}"></script>

    <!-- Script for the multi-select. -->

    <script>
    $(document).ready(function() {

    $('#select_preferences').multiselect({
        buttonText: function(options, select) {
            return 'Look for users that:';
        },
        buttonTitle: function(options, select) {
            var labels = [];
            options.each(function() {
                labels.push($(this).text()); // get the options in a string (with .text method). later it would be joined with - seperated between each.
            });
            $('#range-div,#range-options').toggleClass('hide', labels.length === 0); // hiding both range-div and range-options divs.

             // The class 'hide' hide the content.
             //So I remove it so it would be visible.
             //If the labels array is empty - then do use the hide class to hide the range-selector
            return labels.join(' - ');
 // the options seperated by ' - '
        // This returns the text of th options in labels[].
        }
    });

});
  </script>

<!-- Jquery's range slider script -->
  <script>
  $(function() {
    $( "#range-div" ).slider({
      range: true,
      min: 16,
      max: 120,
      values: [ 16, 45 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val($( "#range-div" ).slider( "values", 0 ) +
      " - " + $( "#range-div" ).slider( "values", 1 ) );
  });
  </script>
</body>

</html>

