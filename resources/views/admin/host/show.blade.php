@extends('admin.layout')

@section('content')
    <p class="lead">{{ $host->name }}</p>
    <hr>

    <p><b>Latest submissions</b></p>
    @forelse ($submissions as $submission)
        <p>
            @include('user', ['user' => $submission->user])
            submitted {!! Html::link($submission->url) !!}
            {!! timeago($submission->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show here yet…</p>
    @endforelse

    <hr>

    <a href="#" class="btn btn-default">Create site</a>
@stop
