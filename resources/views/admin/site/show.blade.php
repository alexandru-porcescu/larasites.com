@extends('admin.layout')

@section('content')
    <p class="lead">{{ $site->title }}</p>
    <hr>

    <div class="media">
        <div class="media-left" style="padding-left:10px;border-left:5px solid #{{ $site->color->getHex() }}">
            <a href="{{ $site->url }}" target="_blank" style="">
                <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 150]) }}">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
            <p>{{ $site->description }}</p>
            <p class="text-muted">{!! Html::image($site->user->twitter_avatar, null, ['width' => 20, 'class' => 'img-circle']) !!} Submitted by {!! tw($site->user) !!}</p>
            <p>{{ $site->vote_count }} votes</p>
        </div>
    </div>

    <hr>

    {!! Html::linkAction('Admin\SiteController@edit', 'Edit', [$site->id], ['class' => 'btn btn-default']) !!}

    @if ($site->approved_at)
        <a href="#" class="btn btn-default btn-disabled" disabled>Approved {!! timeago($site->approved_at) !!}</a>
        {!! Html::linkAction('Admin\SiteController@unapprove', 'Unapprove', [$site->id], ['class' => 'btn btn-default']) !!}
    @else
        {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-default']) !!}
    @endif

    <hr>

    {!! Form::open(['method' => 'delete', 'url' => action('Admin\SiteController@destroy', [$site->id])]) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-default btn-danger']) !!}
    {!! Form::close() !!}
@stop
