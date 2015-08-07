@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        <p>{!! Html::image($site->favicon_url, null, ['width' => 32, 'height' => 32]) !!}</p>
        <p>{!! Html::link($site->url, $site->title) !!}</p>
        <p>{{ $site->description }}</p>
    @endforeach
@stop
