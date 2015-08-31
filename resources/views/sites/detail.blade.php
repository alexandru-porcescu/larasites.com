@extends('layout', ['title' => $site->title . ' was made using Laravel | Larasites – Showcasing the best websites made using Laravel & Lumen', 'description' => $site->description])

@section('head')
    @include('sites.inline-styles')
@stop

@section('content')
    <main class="main" role="main">
        <div class="l-section">
            <div class="l-wrapper">
                <div class="cards">
                    @include('sites.site')
                    <div class="card">
                        @include('comments')
                    </div>
                </div><!-- .cards -->
            </div><!-- .l-wrapper -->
        </div><!-- .l-section -->
    </main>
@stop
