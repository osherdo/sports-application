<!DOCTYPE html>
<html lang="en">
<head>
   <!--For Bootstrap mobile proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--Use the following value to display the webpage in edge mode, which is the highest standards mode supported by Internet Explorer, from Internet Explorer 6 through IE11. -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="/js/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" >

    @yield( 'scripts')
    <title>Sports App @yield('title')</title>

</head>

<body>
    <div class="container">
<div class="col-sm-4">


</div>
        @yield('content')

</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>

</html>

