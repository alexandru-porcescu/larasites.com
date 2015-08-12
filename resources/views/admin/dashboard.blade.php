@extends('admin.layout')

@section('content')
    <p class="lead">Dashboard</p>
    <hr>

    <p><b>Sites waiting for approval</b></p>
    @forelse ($sites as $site)
        <p>
            {!! Html::linkAction('Admin\SiteController@show', $site->title, [$site->id]) !!}
            was created by {!! tw($site->creator) !!}
            {!! timeago($site->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>

    <p><b>Latest submissions</b></p>
    @forelse ($submissions as $submission)
        <p>
            {!! tw($submission->user) !!}
            submitted {!! Html::link($submission->url, null, ['target' => '_blank']) !!} {!! timeago($submission->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>

    <p><b>Newest hosts (without sites)</b></p>
    @forelse ($hosts as $host)
        <p>
            {!! Html::linkAction('Admin\HostController@show', $host->name, [$host->name]) !!}
            was created {!! timeago($host->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>

    <p><b>Latest signups</b></p>
    @forelse ($users as $user)
        <p>
            {!! tw($user) !!} signed up {!! timeago($user->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>
@stop
