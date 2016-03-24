<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{   elixir('css/app.css') }}" >
    @yield( 'scripts')
    <title>Sports App @yield('title')</title>
</head>

<meta charset="utf-8">

<body>
    @section('sidebar') Maser Page content demo @show
    <div class="container">
        @yield('content')
<form action="{{ route('search') }}" method="post">
        <!--the form action is the method in a route called search -->
        {!! csrf_field() !!} @section('search_box')
        <div class="search_box_area col-xs-12 pagination-centered">
				   <div class="col-sm-3">	
						<form class="form-wrapper cf">
							<input type="text" placeholder="Search for name/user..." required> &nbsp; Or:
								<a href="#" class="button button-circle button-flat-action">Search
								</a>  
						</form>
					</div>
					<div class="second_select col-sm-3">
						<!-- preferences search: -->
						<select id="select_preferences" multiple="multiple">
							<option class="options" value="Anaerobic"> Do Anaerobic Routines</option>
							<option class="options" value="Aerobic">Do Aerobic Routines</option>
							<option class="options" value="Diet">Diet Healthy</option>
						</select>
					</div>
							<!-- html code for age-range selector -->
                
					<div class="col-sm-3">
						<div id="range-div" class="hide">
						</div>
						<div id="range-options" class="hide-2">
						<label for="amount">within the ages:</label>
						<br><br><input id="amount">
						<a href="#" class="button button-circle button-flat-action">Search</a>
						</div>
					</div>

        </div>
</form>

    </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap-multiselect.js"></script>

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
                labels.push($(this).text()); //get the options in a string (with .text method). later it would be joined with - seperated between each.
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

