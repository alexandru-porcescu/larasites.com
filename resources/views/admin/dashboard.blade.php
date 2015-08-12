@extends('admin.layout')

@section('content')
    <p class="lead">Dashboard</p>
    <hr>

    <p><b>Latest submissions</b></p>
    @forelse ($submissions as $submission)
        <p>@include('user', ['user' => $submission->user]) submitted {!! Html::link($submission->url) !!} {!! timeago($submission->created_at) !!}</p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>

    <p><b>Newest hosts</b></p>
    @forelse ($hosts as $host)
        <p>{{ $host->name }} was created {!! timeago($host->created_at) !!}</p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>

    <p><b>Latest signups</b></p>
    @forelse ($users as $user)
        <p>
            @include('user', compact('user')) signed up {!! timeago($user->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>
@stop
