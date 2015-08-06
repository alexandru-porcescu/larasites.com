<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title or 'Larasites.com' }}</title>
        <meta name="description" content="Showcasing the best websites built with Laravel & Lumen.">
        <meta name="keywords" content="laravel, lumen, php, framework, web, artisans, larasites">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <br>
        <div class="container">
            @include('header')
            <hr>
            @yield('content')
            <hr>
            @include('footer')
        </div>
        <br>
        <br>
    </body>
</html>
