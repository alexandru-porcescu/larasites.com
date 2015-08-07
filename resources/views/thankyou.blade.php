@extends('layout', ['title' => 'Submit a site | Larasites.com'])

@section('content')
    <p>Thanks for submitting your work to Larasites!</p>
    <p>{!! Html::link('submit', 'Submit another site', ['class' => 'btn btn-default']) !!}</p>
    <hr>
    <p>Why don't you visit one of these community sites while you wait for your site to be approved...</p>
    <p>
        <ul>
            <li>{!! Html::link('http://laravel.com', 'laravel.com') !!}</li>
            <li>{!! Html::link('http://lumen.laravel.com', 'lumen.laravel.com') !!}</li>
            <li>{!! Html::link('http://laravel.io/forum', 'laravel.io') !!}</li>
            <li>{!! Html::link('https://laramap.com', 'laramap.com') !!}</li>
            <li>{!! Html::link('https://laracasts.com', 'laracasts.com') !!}</li>
            <li>{!! Html::link('https://larajobs.com', 'larajobs.com') !!}</li>
            <li>{!! Html::link('https://laravel-news.com', 'laravel-news.com') !!}</li>
            <li>{!! Html::link('https://larachat.co', 'larachat.co') !!}</li>
        </ul>
    </p>
@stop
