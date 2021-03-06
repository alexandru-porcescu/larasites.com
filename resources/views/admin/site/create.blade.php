@extends('admin.layout')

@section('content')
    <p class="lead">Create Site</p>
    <hr>

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

    {!! Form::open(['method' => 'post', 'url' => action('Admin\SiteController@store')]) !!}
    {!! Form::hidden('host', $host->name) !!}

    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
        <label class="control-label">Canonical URL</label>
        {!! Form::text('url', $host->url, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label class="control-label">Description</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>

    <div class="form-group {{ $errors->has('image_url') ? 'has-error' : '' }}">
        <label class="control-label">Image URL</label>
        {!! Form::text('image_url', 'https://logo.clearbit.com/' . $host->name . '?size=150', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('red') || $errors->has('green') || $errors->has('blue') ? 'has-error' : '' }}">
        <label class="control-label">RGB</label>
        <div class="row">
            <div class="col-md-4">
                {!! Form::text('red', null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::text('green', null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::text('blue', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <hr>

    {!! Form::submit('Create', ['class' => 'btn btn-secondary']) !!}

    {!! Form::close() !!}
@stop
