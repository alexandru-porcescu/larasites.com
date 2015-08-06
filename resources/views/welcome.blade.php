<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Larasites.com</title>
        <meta name="description" content="Showcasing the best websites built with Laravel & Lumen.">
        <meta name="keywords" content="laravel, php, framework, web, artisans, larasites">
        <link rel="canonical" href="https://www.larasites.com">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <p><h5>{!! Html::link('/', 'Larasites.com') !!}</h5></p>
            <hr>
            <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
            <hr>
            @foreach ($sites as $site)
                <p>{!! Html::image($site->favicon_url, null, ['width' => 32, 'height' => 32]) !!}</p>
                <p>{!! Html::link($site->url, $site->title) !!}</p>
                <p>{{ $site->description }}</p>
                <hr>
            @endforeach
            <p class="text-muted">Made by {!! Html::link('http://www.wearenext.co.za', 'Next') !!} in Cape Town</p>
        </div>
    </body>
</html>
