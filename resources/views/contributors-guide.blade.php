@extends('layout', ['title' => 'Contributors Guide | Larasites.com'])

@section('content')
<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <article class="article article--narrow">
                {!! md(base_path('docs/contributors-guide.md')) !!}
            </article>
        </div>
    </div>
</main>
@stop
