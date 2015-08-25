@extends('layout')

@section('content')
@include('nav')

<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <div class="cards">
                @foreach ($sites as $site)
                    @include('site-css', compact('site'))
                    @include('site', compact('site'))
                @endforeach
            </div><!-- .cards -->
        </div><!-- .l-wrapper -->
    </div><!-- .l-section -->
</main>
@stop
