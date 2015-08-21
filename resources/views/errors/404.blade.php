@extends('layout', ['title' => '404'])

@section('content')
@include('nav')
<main class="main" role="main">
    <div class="l-section l-section--background" style="background-image: url('{{ url('assets/images/background-page-not-found-1268x664.png') }}');">
        <div class="l-wrapper">
            <p class="u-visuallyhidden">Sorry, but the page you were trying to view does not exist.</p>
        </div>
    </div>
</main>
@stop
