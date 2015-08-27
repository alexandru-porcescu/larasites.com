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
            <h4 class="media-heading">{!! Html::linkAction('Admin\SiteController@show', $site->title, [$site->id]) !!}</h4>
            <p>{{ $site->description }}</p>
            <small>
                <p class="text-muted">Submitted by {!! Html::linkAction('Admin\UserController@show', '@' . $site->user->twitter_nickname, [$site->user->twitter_id]) !!}</p>
            </small>
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
