@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li><a href="{{ action('Admin\SiteController@index') }}">sites</a></li>
        <li><a href="{{ action('Admin\SiteController@show', [$site->id]) }}">{{ strtolower($site->title) }}</a></li>
        <li class="active">Edit</li>
    </ol>

    <hr>
    <p class="lead">Edit Site</p>
    <hr>

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

    {!! Form::model($site, ['method' => 'put', 'url' => action('Admin\SiteController@update', [$site->id])]) !!}

    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
        <label class="control-label">Canonical URL</label>
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
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
        {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
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

    {!! Form::submit('Update', ['class' => 'btn btn-secondary']) !!}

    {!! Form::close($site) !!}
@stop
