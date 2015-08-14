@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>
    <hr>
    <p>
        Order by
        {!! Html::linkAction('WelcomeController@showWelcome', 'latest', [], ['class' => cx(['btn btn-sm btn-default' => true, 'active' => Input::get('order') !== 'popular'])]) !!}
        or {!! Html::linkAction('WelcomeController@showWelcome', 'most popular', ['order' => 'popular'], ['class' => cx(['btn btn-sm btn-default' => true, 'active' => Input::get('order') === 'popular'])]) !!}
    </p>
    @foreach ($sites as $site)
        <hr>
        @include('site', compact('site'))
    @endforeach
@stop
