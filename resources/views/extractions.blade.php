<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Approve Submissions | Larasites.com</title>
        <meta name="description" content="Showcasing the best websites built with Laravel & Lumen.">
        <meta name="keywords" content="laravel, php, framework, web, artisans, larasites">
        <link rel="canonical" href="https://www.larasites.com">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <br>
        <br>
        <div class="container">
            @foreach ($extractions as $extraction)
                <p>{!! Html::image(array_get($extraction->data, 'favicon_url')) !!}</p>
                <p><b>{{ array_get($extraction->data, 'title') }}</b> — {!! Html::link($extraction->url, null, ['target' => '_blank']) !!}</p>
                <p>{{ array_get($extraction->data, 'description') }}</p>
                <!--
                @foreach (array_get($extraction->data, 'favicon_colors', []) as $color)
                    <div style="background-color: rgb({{ $color['color'][0]}}, {{ $color['color'][1]}}, {{ $color['color'][2]}}); width: 50px; height: 50px; display: inline-block;"></div>
                @endforeach
                -->
                <p>Submitted by {!! Html::link('https://twitter.com/@' . $extraction->submission->user->twitter_nickname, '@' . $extraction->submission->user->twitter_nickname) !!}</p>
                {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}
                <hr>
            @endforeach
        </div>
    </body>
</html>
