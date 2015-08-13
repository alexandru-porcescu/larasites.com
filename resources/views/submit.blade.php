@extends('layout', ['title' => 'Submit a site | Larasites.com'])

@section('content')
    {!! Form::open(['method' => 'post', 'url' => '/submit/submit']) !!}
    <div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
        {!! Form::text('url', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => 'eg. http://laravel.com']) !!}
        @if (count($errors) > 0)
            <p class="help-block">{{ $errors->first() }}</p>
        @endif
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop
