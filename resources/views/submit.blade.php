<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Submit a site | Larasites.com</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <p><h5>{!! Html::link('/', 'Larasites.com') !!}</h5></p>
            <hr>
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::input('url', 'url', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'eg. http://laravel.com']) !!}
            </div>
            {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
            <hr>
            <p class="text-muted">Made by {!! Html::link('http://www.wearenext.co.za', 'Next') !!} in Cape Town</p>
        </div>
    </body>
</html>
