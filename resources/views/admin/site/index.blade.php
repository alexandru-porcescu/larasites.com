@extends('admin.layout')

@section('content')
    @foreach ($sites as $site)
        @include('admin.site.site', compact('site'))
        <hr>
        <br>
    @endforeach
@stop
