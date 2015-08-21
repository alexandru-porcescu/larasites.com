@extends('layout', ['title' => 'Larasites - Privacy Policy'])

@section('content')
<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <article class="article article--narrow">
                {!! md(base_path('docs/privacy-policy.md')) !!}
            </article>
        </div>
    </div>
</main>
@stop
