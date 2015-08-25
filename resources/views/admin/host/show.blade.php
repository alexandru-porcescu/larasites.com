@extends('admin.layout')

@section('content')
    <p class="lead">{{ $host->name }}</p>
    <hr>

    <p><b>Submissions</b></p>
    @forelse ($submissions as $submission)
        <p>
            {!! Html::linkAction('Admin\UserController@show', '@' . $submission->user->twitter_nickname, [$submission->user->twitter_id]) !!}
            submitted {!! Html::link($submission->url) !!}
            {!! timeago($submission->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show here yet…</p>
    @endforelse

    <hr>

    {!! Html::linkAction('Admin\SiteController@create', 'Create site', ['host' => $host->name], ['class' => 'btn btn-secondary']) !!}

    <hr>

    {!! Form::open(['method' => 'delete', 'url' => action('Admin\HostController@destroy', [$host->name])]) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-secondary btn-danger']) !!}
    {!! Form::close() !!}
@stop
