@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li><a href="{{ action('Admin\SiteController@index') }}">sites</a></li>
        <li class="active">{{ strtolower($site->title) }}</li>
    </ol>

    <hr>
    <p class="lead">{{ $site->title }}</p>
    <hr>

    <div class="media">
        <div class="media-left">
            <a href="{{ action('Admin\SiteController@show', [$site->id]) }}" target="_blank" style="">
                <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 150]) }}">
            </a>
        </div>
        <div class="media-body">
            <p><b>Description</b></p>
            <p>{{ $site->description }}</p>

            <p><b>Submissions</b></p>

            @foreach ($site->host->submissions as $submission)
                <p>
                    {!! Html::linkAction('Admin\UserController@show', '@'.$submission->user->twitter_nickname, [$submission->user->twitter_id]) !!}
                    submitted
                    {!! Html::link($submission->url, null, ['target' => '_blank']) !!}
                    {!! timeago($submission->created_at) !!}
                </p>
            @endforeach

            <p><b>Votes</b></p>

            @foreach ($site->votes as $vote)
                <p>
                    {!! Html::linkAction('Admin\UserController@show', '@'.$vote->user->twitter_nickname, [$vote->user->twitter_id]) !!}
                    voted for this site
                    {!! timeago($vote->created_at) !!}
                </p>
            @endforeach
        </div>
    </div>

    <hr>

    {!! Html::linkAction('Admin\SiteController@edit', 'Edit', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}

    @if ($site->approved_at)
        <a href="#" class="btn btn-sm btn-secondary disabled">Approved {!! timeago($site->approved_at) !!}</a>
        {!! Html::linkAction('Admin\SiteController@unapprove', 'Unapprove', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
    @else
        {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
    @endif
@stop
