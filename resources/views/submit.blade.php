<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Submit | Larasites.com</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <br>
        <div class="container">
            <p class="lead">Submit a site</p>
            {!! Form::open() !!}
            <div class="form-group">
                <label for="url">URL</label>
                {!! Form::input('url', 'url', null, ['id' => 'url', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'eg. http://laravel.com']) !!}
            </div>
            {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </body>
</html>
