@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <h4>{!! Html::link($site->url, $site->title) !!}</h4>
        <p class="text-muted">{{ $site->description }}</p>
        @if (!$site->approved_at)
            {!! Form::open(['method' => 'post', 'url' => action('ApprovalController@submitApproval') ]) !!}
            {!! Form::hidden('site_id', $site->id) !!}
            {!! Form::submit('Approve', ['class' => 'btn btn-default btn-sm']) !!}
            {!! Form::close() !!}
        @endif
    @endforeach
@stop
