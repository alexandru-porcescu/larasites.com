@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <h4>{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <p class="text-muted">
            Submitted by {!! Html::link('https://www.twitter.com/@' . $site->submission->user->twitter_nickname, '@' . $site->submission->user->twitter_nickname) !!}
            <time class="timeago" datetime="{{ $site->submission->created_at->toIso8601String() }}"></time>
        </p>
        @if (!$site->approved_at)
            {!! Form::open(['method' => 'post', 'url' => action('ApprovalController@submitApproval') ]) !!}
            {!! Form::hidden('site_id', $site->id) !!}
            {!! Form::submit('Approve', ['class' => 'btn btn-default btn-sm']) !!}
            {!! Form::close() !!}
        @endif
    @endforeach
@stop
