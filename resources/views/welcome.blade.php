<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title" id="power">0</div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('assets/js/socket.io.js') }}"></script>
    <script>
    var socket = io('http://localhost:3000');
    socket.on("test-channel:App\\Events\\Broadcast1", function(message){
         // increase the power everytime we load test route
         $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
     });
    </script>
    </body>
</html>

{{-- View was totally undefined. It won't work --}}