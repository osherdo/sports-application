<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      @yield('scripts')
</head>

        <title>Sports App @yield('title')</title>
        <!--twitter bootstrap -check later how to include thorugh sass.  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
        <link rel="stylesheet" href="{{	elixir('css/app.css') }}"
    </head>
    <body>
        @section('sidebar')
*content from master page for demo.* 
@show



     <div class="container">
            @yield('content')
        </div>
        

    </body>
</html>