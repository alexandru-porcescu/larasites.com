@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li class="active">sites</li>
    </ol>

    <hr>
    <p class="lead">Sites</p>
    <hr>

    @foreach ($sites as $key => $site)
        @if ($key > 0) <hr> @endif
        @include('admin.site.site', compact('site'))
    @endforeach

    <br>

    {!! $sites->render() !!}
@stop
