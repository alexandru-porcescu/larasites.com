@extends('layout', ['title' => 'Larasites – Terms of Service'])

@section('content')
<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <article class="article article--narrow">
                {!! md(base_path('docs/terms-of-service.md')) !!}
            </article>
        </div>
    </div>
</main>
@stop
