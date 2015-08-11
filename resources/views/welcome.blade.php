@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <div class="media">
            <div class="media-left">
                <a href="{{ $site->url }}" target="_blank">
                    <img class="media-object" src="{{ cloudinary_url(basename($site->image_url), ['width' => 80, 'height' => 80]) }}">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
                <p>{{ $site->description }}</p>
                <p>Submitted by {!! tw($site->user) !!}</p>
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
