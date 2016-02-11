<html>
    <head>
      
        <title>Sports App @yield('title')</title>

        <link rel="stylesheet" href="{{	elixir('css/app.css') }}"
    </head>
    <body>
        @section('sidebar')
*content from master page for demo.* 
@show

      <!--  <div class="container">
  <div class="column"></div>
  <div class="column"></div>
  <div class="column"></div>
  <div class="column"></div>
</div>
-->



     <div class="container">
            @yield('content')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>



    </body>
</html>