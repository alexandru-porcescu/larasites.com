@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <h4>{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <p>Submitted by {!! tw($site->user) !!}</p>
        @if (!$site->approved_at)
            {!! Form::open(['url' => action('ApprovalController@submitApproval')]) !!}
            {!! Form::hidden('site_id', $site->id) !!}
            {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        @endif
    @endforeach
@stop
