@extends('admin.layout')

@section('content')
    <p class="lead">{{ $site->title }}</p>
    <hr>

    <div class="media">
        <div class="media-left" style="padding-left:10px;border-left:5px solid rgb({{ $site->rgb }})">
            <a href="{{ $site->url }}" target="_blank" style="">
                <img class="media-object" src="{{ cloudinary_url($site->image_name, ['width' => 100, 'height' => 100]) }}">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
            <p>{{ $site->description }}</p>
            <p class="text-muted">{!! Html::image($site->user->twitter_avatar, null, ['width' => 20, 'class' => 'img-circle']) !!} Submitted by {!! tw($site->user) !!}</p>
        </div>
    </div>

    <hr>

    {!! Html::linkAction('Admin\SiteController@edit', 'Edit', [$site->id], ['class' => 'btn btn-default']) !!}

    @if ($site->approved_at)
        <a href="#" class="btn btn-default btn-disabled" disabled>Approved {!! timeago($site->approved_at) !!}</a>
    @else
        {!! Form::open(['method' => 'post', 'url' => action('Admin\SiteController@approve', [$site->id])]) !!}
        {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}
        {!! Form::close() !!}
    @endif

    <hr>

    {!! Form::open(['method' => 'delete', 'url' => action('Admin\SiteController@destroy', [$site->id])]) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-default btn-danger']) !!}
    {!! Form::close() !!}
@stop
