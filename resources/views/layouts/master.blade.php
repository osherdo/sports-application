<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{   elixir('css/app.css') }}" >
    @yield( 'scripts')
    <title>Sports App @yield('title')</title>
</head>

<body>
    <form action="{{ route('search') }}" method="post">
        <!--the form action is the method in a route called search -->
        {!! csrf_field() !!} @section('search_box')
        <div class="search_box_area col-xs-3">
            <form class="form-wrapper cf">
                <input type="text" placeholder="Search for name/user..." required> &nbsp; Or:
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="second_select">
            <!-- preferences search: -->
            <select id="select_preferences" multiple="multiple">
               <option class="options" value="Anaerobic"> Do Anaerobic Routines</option>
                <option class="options" value="Aerobic">Do Aerobic Routines</option>
                <option class="options" value="Diet">Diet Healthy</option>
            </select>
        </div>

        <!-- html code for age-range selector -->
         <div class="hide" id="range-div">
    <input class="range-slider hide" value="23" />
        </div>
          <input type="submit" value="Search">
    </form>

    @section('sidebar') content from master page for demo. @show
    <div class="container">
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>
    <script src="{!! asset('js/jquery.range-min.js') !!}"></script>

<!--2 scripts: One for the multi-select.Then define it in the second script -->

    <script>
    $(document).ready(function() {

        $('#select_preferences').multiselect({
            buttonText: function(options, select) {
                return 'Look for users that:';
            },
            buttonTitle: function(options, select) {
                var labels = [];
                options.each(function() {
                    labels.push($(this).text()); //get the options in a string. later it would be joined with - seprate between each.
                });
             if(!labels.length ===0 )
            {
             $('#range-div').removeClass('hide');
             // The class 'hide' hide the content.
             //So I remove it so it would be visible.
            }
            if (labels.length ===0)
             $('#range-div').addClass('hide');
         //If the labels array is empty - then do use the hide class to hide the range-selector.
                return labels.join(' - ');
        // the options seperated by ' - '
        // This returns the text of th options in labels[].
            }
        });

      $('#select_preferences').change(function() {
            $('#range-div').removeClass('hide');
        });

        $('.range-slider').jRange({
            from: 16,
            to: 100,
            step: 1,
            scale: [16, 30, 50, 75, 100],
            format: '%s',
            width: 300,
            showLabels: true,
            isRange: true
        });
    });
    </script>
</body>

</html>

