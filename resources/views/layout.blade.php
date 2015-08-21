<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title or 'Larasites.com' }}</title>
        <meta name="description" content="Showcasing the best websites made using Laravel & Lumen.">
        <meta name="keywords" content="laravel, lumen, php, framework, web, artisans, larasites">
        {!! Html::style(elixir('css/style.css')) !!}
    </head>
    <body>
        @include('header')
        @yield('content')
        @include('footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.1/jquery.timeago.min.js"></script>
        <script>$('time.timeago').timeago();</script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            @if (Auth::user())
                ga('set', '&uid', '{{ Auth::user()->twitter_id }}');
            @endif
            ga('create', 'UA-66193499-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>
