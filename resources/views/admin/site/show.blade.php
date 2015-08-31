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

    <div class="row">
        <div class="col-md-3">
            <a href="{{ action('Admin\SiteController@show', [$site->id]) }}" target="_blank" style="">
                <img class="img-responsive" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 150]) }}">
            </a>
            <p><div style="background: {{ $site->rgbCss }}; width: 150px; height: 44px;"></div></p>
        </div>
        <div class="col-md-9">
            <p><b>Description</b></p>
            <p>{{ $site->description }}</p>
            <br>

            <p><b>Details</b></p>
            @if ($site->featured_at)
                <p>Featured by {!! Html::linkAction('Admin\UserController@show', '@' . $site->featurer->twitter_nickname, [$site->featurer->id]) !!} {!! timeago($site->featured_at) !!}</p>
            @endif

            @if ($site->approved_at)
                <p>Approved by {!! Html::linkAction('Admin\UserController@show', '@' . $site->approver->twitter_nickname, [$site->approver->id]) !!} {!! timeago($site->approved_at) !!}</p>
            @endif

            <p>Created by {!! Html::linkAction('Admin\UserController@show', '@' . $site->creator->twitter_nickname, [$site->creator->id]) !!} {!! timeago($site->created_at) !!}</p>

            <br>

            <p><b>Submissions</b></p>

            @foreach ($site->host->submissions as $submission)
                <p>
                    {!! Html::linkAction('Admin\UserController@show', '@'.$submission->user->twitter_nickname, [$submission->user->id]) !!}
                    submitted
                    {!! Html::link($submission->url, null, ['target' => '_blank']) !!}
                    {!! timeago($submission->created_at) !!}
                </p>
            @endforeach
            <br>

            <p><b>Hearts</b></p>

            @forelse ($site->votes as $vote)
                <p>
                    {!! Html::linkAction('Admin\UserController@show', '@'.$vote->user->twitter_nickname, [$vote->user->id]) !!}
                    hearted this site
                    {!! timeago($vote->created_at) !!}
                </p>
            @empty
                <p class="text-muted">No hearts yet…</p>
            @endforelse
        </div>
    </div>

    <hr>

    {!! Html::linkAction('Admin\SiteController@edit', 'Edit', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}

    @if ($site->approved_at)
        @if ($site->featured_at)
            {!! Html::linkAction('Admin\SiteController@unfeature', 'Remove Feature', [$site->id], ['class' => 'btn btn-secondary btn-sm']) !!}
        @else
            {!! Html::linkAction('Admin\SiteController@feature', 'Feature', [$site->id], ['class' => 'btn btn-secondary btn-sm']) !!}
        @endif

        {!! Html::linkAction('Admin\SiteController@unapprove', 'Unapprove', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
    @else
        {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
    @endif
@stop
