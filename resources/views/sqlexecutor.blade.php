<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Laravel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    </head>
    <body class="antialiased">

  
    <div id="app">
        @include('message')
        
        @yield('content')
    </div>


        <form action="{{ route('queryexewithdata') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="textData">Query Executor example</label>
                <textarea class="form-control" name="textData" rows="5"></textarea>

                <input type="submit" value="Execute" />
                <button type="submit">Submit</button>
                <!--<a class="btn btn-outline-success" id="executor1" type="submit"> Execute</a>-->
            </div>
        </form>
    </body>
</html>
