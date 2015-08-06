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

                <p><b>{!! Html::link(array_get($extraction->data, 'provider_url')) !!}</b></p>
                {!! Form::hidden('url', array_get($extraction->data, 'provider_url')) !!}

                <hr>

                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="title" value="{{ array_get($extraction->data, 'title') }}"/>
                </div>

                <hr>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ array_get($extraction->data, 'description') }}</textarea>
                </div>

                <hr>

                <p><label>Color</label></p>

                @foreach (array_get($extraction->data, 'favicon_colors', []) as $color)
                    @include('color', ['color' => $color])
                @endforeach

                @foreach (array_get($extraction->data, 'images', []) as $image)
                    @foreach ($image['colors'] as $color)
                        @include('color', ['color' => $color])
                    @endforeach
                @endforeach

                <hr>
                <p><label>Image</label></p>

                @foreach (array_get($extraction->data, 'images', []) as $image)
                    <div class="media">
                        <div class="media-left">
                            <a href="{{ $image['url'] }}">
                                <img class="media-object" src="{{ $image['url'] }}" alt="..." width="80">
                            </a>
                        </div>
                        <div class="media-body">
                            @if ($image['caption'])
                                <p>Caption: {{ $image['caption'] }}</p>
                            @endif
                            <p>Width: {{ $image['width'] }}</p>
                            <p>Height: {{ $image['height'] }}</p>
                        </div>
                    </div>
                @endforeach

                <hr>

                <p>Submitted by {!! Html::link('https://twitter.com/@' . $extraction->submission->user->twitter_nickname, '@' . $extraction->submission->user->twitter_nickname) !!}</p>

                <hr>

                {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}

                {!! Form::close() !!}
                <hr>
            @endforeach
        </div>
    </body>
</html>
