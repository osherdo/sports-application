<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      @yield('scripts')
</head>

        <title>Sports App @yield('title')</title>
        <!--twitter bootstrap -check later how to include thorugh sass.  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
        <link rel="stylesheet" href="{{	elixir('css/app.css') }}"
    </head>
    <body>

      @section('search_box')
<div class="search_box_area">
<form class="form-wrapper cf">
    <input type="text" placeholder="Search for name/user..." required>
    <button type="submit">Search</button>
</form>
 </div>
 <div class="mutual_interests_search">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>
@yield('search_box')

        @section('sidebar')
*content from master page for demo.* 
@show



     <div class="container">
            @yield('content')
        </div>
        

    </body>
</html>