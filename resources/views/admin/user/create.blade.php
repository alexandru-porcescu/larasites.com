@extends('admin.layout')

@section('content')
    <p class="lead">Create User</p>
    <hr>

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

    {!! Form::open(['method' => 'post', 'url' => action('Admin\UserController@store')]) !!}

    <div class="form-group {{ $errors->has('twitter_id') ? 'has-error' : '' }}">
        <label class="control-label">Twitter ID</label>
        {!! Form::text('twitter_id', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('twitter_nickname') ? 'has-error' : '' }}">
        <label class="control-label">Twitter Nickname</label>
        {!! Form::text('twitter_nickname', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('twitter_avatar') ? 'has-error' : '' }}">
        <label class="control-label">Twitter Avatar</label>
        {!! Form::text('twitter_avatar', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('twitter_avatar_original') ? 'has-error' : '' }}">
        <label class="control-label">Twitter Avatar (Original)</label>
        {!! Form::text('twitter_avatar_original', null, ['class' => 'form-control']) !!}
    </div>

    <hr>
    {!! Form::submit('Create', ['class' => 'btn btn-secondary']) !!}

    {!! Form::close() !!}
@stop
