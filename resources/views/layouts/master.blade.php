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
    <option value="cheese"> Do Anerobic Routines</option>
    <option value="tomatoes">Do Aerobic Routines</option>
    <option value="mozarella">Diet Healthy</option>
</select>
<script type="text/javascript">
    $(document).ready(function() {
        $('#select_preferences').multiselect({
            buttonText: function(options, select) {
                return 'Look for users that:';
            },
            buttonTitle: function(options, select) {
                var labels = [];
                options.each(function () {
                    labels.push($(this).text());
                });
                return labels.join(' - ');
            }
        });
    });
</script>
</div>


</form>
@yield('search_box')

@section('sidebar')
*content from master page for demo.* 
@show



     <div class="container">
            @yield('content')
        </div>
        
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>
    </body>
</html>