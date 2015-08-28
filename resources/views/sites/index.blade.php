@extends('layout')

@section('head')
    @foreach ($sites as $site)
        @include('sites.inline-styles', compact('site'))
    @endforeach
@stop

@section('content')
@include('nav')

<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <div class="cards">
                @foreach ($sites as $site)
                    @include('sites.site', compact('site'))
                @endforeach
            </div><!-- .cards -->
            {!! $paginator->render() !!}
        </div><!-- .l-wrapper -->
    </div><!-- .l-section -->
</main>
@stop
