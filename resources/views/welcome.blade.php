@extends('layout')

@section('head')
    @foreach ($sites as $site)
        @include('site-css', compact('site'))
    @endforeach
@stop

@section('content')
@include('nav')

<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <div class="cards">
                @foreach ($sites as $site)
                    @include('site', compact('site'))
                @endforeach
            </div><!-- .cards -->
            <br>
            {!! $paginator->render() !!}
        </div><!-- .l-wrapper -->
    </div><!-- .l-section -->
</main>
@stop
