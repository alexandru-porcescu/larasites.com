@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <div class="media">
            <div class="media-left" style="padding-left:10px;border-left:5px solid rgb({{ $site->rgb }})">
                <a href="{{ $site->url }}" target="_blank" style="">
                    <img class="media-object" src="{{ $site->image_url }}">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
                <p>{{ $site->description }}</p>
                <p>{!! Html::image($site->user->twitter_avatar, null, ['width' => 20, 'class' => 'img-circle']) !!} {!! tw($site->user) !!}</p>
                @if (!$site->approved_at)
                    {!! Form::open(['url' => action('ApprovalController@submitApproval')]) !!}
                    {!! Form::hidden('site_id', $site->id) !!}
                    {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    @endforeach
@stop
