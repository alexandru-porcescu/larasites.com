@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <h4>{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <p>Submitted by {!! tw($site->host->submissions->first()->user) !!}</p>
    @endforeach
@stop
