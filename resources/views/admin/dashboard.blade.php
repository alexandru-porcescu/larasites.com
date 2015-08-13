@extends('admin.layout')

@section('content')
    <p class="lead">Dashboard</p>
    <hr>

    <p><b>Sites waiting for approval</b></p>
    @forelse ($sites as $site)
        <p>
            {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-default btn-xs']) !!}
            {!! Html::linkAction('Admin\SiteController@show', $site->title, [$site->id]) !!}
            was created by {!! tw($site->creator) !!}
            {!! timeago($site->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>

    <p><b>Newest hosts</b></p>
    @forelse ($hosts as $host)
        <p>
            {!! Html::linkAction('Admin\SiteController@create', 'Create site', ['host' => $host->name], ['class' => 'btn btn-default btn-xs']) !!}
            {!! Html::linkAction('Admin\HostController@show', $host->name, [$host->name]) !!}
            was created {!! timeago($host->created_at) !!}
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

    <p><b>Latest signups</b></p>
    @forelse ($users as $user)
        <p>
            {!! Html::linkAction('Admin\UserController@show', '@' . $user->twitter_nickname, [$user->twitter_id]) !!} signed up {!! timeago($user->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
    <br>
@stop
