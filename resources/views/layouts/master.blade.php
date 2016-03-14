<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      @yield('scripts')
</head>

        <title>Sports App @yield('title')</title>
        <!--twitter bootstrap -check later how to include thorugh sass.  -->
 
        <link rel="stylesheet" href="{{	elixir('css/app.css') }}"
                                           
<body>
<form action="{{ route('search') }}" method="post"> <!--the form action is the method in a route called search -->
 @section('search_box')
<div class="search_box_area col-xs-3">
<form class="form-wrapper cf">
    <input type="text" placeholder="Search for name/user..." required> &nbsp; Or: 
    <button type="submit">Search</button> 
</form>

 </div>

<div class="second_select>"

<!-- preferences search: -->
<select id="select_preferences" multiple="multiple">
    <option value="Anerobic"> Do Anerobic Routines</option>
    <option value="Aerobic">Do Aerobic Routines</option>
    <option value="Diet">Diet Healthy</option>
</select>
<script type="text/javascript">
    $(document).ready(function() {
        $('range-slider').hide();
        $('#select_preferences').multiselect({
            buttonText: function(options, select) {
                return 'Look for users that:';
            },
            buttonTitle: function(options, select) {
                var labels = [];
                options.each(function () {
                    labels.push($(this).text());
                });
                $('item').show();
                return labels.join(' - ');
            }
        });
    });
</script>
<!-- html code & script for age-range selector -->

<input type="hidden" class="slider-input" value="23" />

<script>
    $(document).ready(function() {

$('.range-slider').jRange({
    from: 16,
    to: 100,
    step: 1,
    scale: [16,30,50,75,100],
    format: '%s',
    width: 300,
    showLabels: true,
    isRange : true
})});
</script>
</div>


</form>

@section('sidebar')
*content from master page for demo.* 
@show



     <div class="container">
            @yield('content')
        </div>
        
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>
<script src="{!! asset('js/jquery.range-min.js') !!}"></script>
    </body>
</html>