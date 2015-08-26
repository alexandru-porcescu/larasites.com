<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title or 'Larasites – Showcasing the best websites made using Laravel & Lumen' }}</title>
        <meta name="description" content="Larasites is a curated collection of the best websites made using the open source PHP framework, Laravel.">
        <meta name="keywords" content="laravel, lumen, php, open-source, framework, web, artisans, larasites, websites">
        <link rel="apple-touch-icon" href="{{ url('apple-touch-icon.png') }}">
        {!! Html::style(elixir('css/style.css')) !!}
        <!-- Web Font -->
        <script>
            WebFontConfig = {
                google: {
                    families: ['Source+Sans+Pro:400,600,700']
                }
            };
        </script>
        <!-- Web Font Loader -->
        <script>
            (function(){var e=document.createElement("script");e.src=("https:"==document.location.protocol?"https":"http")+
            "://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js";e.type="text/javascript";e.async="true";
            var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();
        </script>
        @yield('head')
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
