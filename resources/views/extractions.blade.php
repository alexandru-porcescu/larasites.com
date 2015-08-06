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
                {!! Form::open(['method' => 'post', 'url' => 'queue/approve']) !!}

                {!! Form::hidden('extraction_id', $extraction->id) !!}

                <p>{!! Html::image(array_get($extraction->data, 'favicon_url')) !!}</p>
                {!! Form::hidden('favicon_url', array_get($extraction->data, 'favicon_url')) !!}

                <p><b>{{ array_get($extraction->data, 'title') }}</b> — {!! Html::link($extraction->url, null, ['target' => '_blank']) !!}</p>
                {!! Form::hidden('url', array_get($extraction->data, 'url')) !!}
                {!! Form::hidden('title', array_get($extraction->data, 'title')) !!}

                <p>{{ array_get($extraction->data, 'description') }}</p>
                {!! Form::hidden('description', array_get($extraction->data, 'description')) !!}

                @foreach (array_get($extraction->data, 'favicon_colors', []) as $color)
                    <label>
                        <input name="color" type="radio" value="{{ $color['color'][0]}},{{ $color['color'][1]}},{{ $color['color'][2]}}">
                            <span style="background-color: rgb({{ $color['color'][0]}}, {{ $color['color'][1]}}, {{ $color['color'][2]}}); width: 20px; height: 20px; display: inline-block;"></span>
                        </input>
                    </label>
                @endforeach

                <p>Submitted by {!! Html::link('https://twitter.com/@' . $extraction->submission->user->twitter_nickname, '@' . $extraction->submission->user->twitter_nickname) !!}</p>

                {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}

                {!! Form::close() !!}
                <hr>
            @endforeach
        </div>
    </body>
</html>
