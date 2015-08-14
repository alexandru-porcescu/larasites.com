@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    <hr>
    <p>Order by {!! Html::linkAction('WelcomeController@showWelcome', 'latest') !!} or {!! Html::linkAction('WelcomeController@showWelcome', 'most popular', ['order' => 'popular']) !!}</p>
    @foreach ($sites as $site)
        <hr>
        @include('site', compact('site'))
    @endforeach
@stop
