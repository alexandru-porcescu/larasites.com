@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li class="active">hosts</li>
    </ol>

    <hr>
    <p class="lead">Hosts</p>
    <hr>

    @foreach ($hosts as $key => $host)
        @if ($key > 0) <hr> @endif
        {!! Html::linkAction('Admin\HostController@show', $host->name, [$host->id]) !!}
    @endforeach
@stop
