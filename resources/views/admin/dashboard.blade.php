@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li class="active">admin</li>
    </ol>

    <hr>
    <p class="lead">Admin Dashboard</p>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <p><b>Sites waiting for approval</b></p>

            @forelse ($sites as $site)
                <p>
                    {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                    {!! Html::linkAction('Admin\SiteController@show', $site->title, [$site->id]) !!}
                    was created by
                    {!! Html::linkAction('Admin\UserController@show', '@' . strtolower($site->creator->twitter_nickname), [$site->creator->twitter_id]) !!}
                    {!! timeago($site->created_at) !!}
                </p>
            @empty
                <p class="text-muted">Nothing to show right now…</p>
            @endforelse

            <br>

            <p><b>Newest hosts</b></p>

            @forelse ($hosts as $host)
                <p>
                    {!! Html::linkAction('Admin\SiteController@create', 'Create site', ['host' => $host->name], ['class' => 'btn btn-secondary btn-sm']) !!}
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
                    {!! Html::linkAction('Admin\UserController@show', '@' . strtolower($submission->user->twitter_nickname), [$submission->user->twitter_id]) !!}
                    submitted {!! Html::link($submission->url, null, ['target' => '_blank']) !!} {!! timeago($submission->created_at) !!}
                </p>
            @empty
                <p class="text-muted">Nothing to show right now…</p>
            @endforelse

            <br>

            <p><b>Latest votes</b></p>

            @forelse ($votes as $vote)
                <p>
                    {!! Html::linkAction('Admin\UserController@show', '@' . strtolower($vote->user->twitter_nickname), [$vote->user->twitter_id]) !!} voted for {!! Html::linkAction('Admin\SiteController@show', $vote->site->title, [$vote->site->id]) !!} {!! timeago($vote->created_at) !!}
                </p>
            @empty
                <p class="text-muted">Nothing to show right now…</p>
            @endforelse

            <br>

            <p><b>Newest users</b></p>

            @forelse ($users as $user)
                <p>
                    {!! Html::linkAction('Admin\UserController@show', '@' . strtolower($user->twitter_nickname), [$user->twitter_id]) !!} signed up {!! timeago($user->created_at) !!}
                </p>
            @empty
                <p class="text-muted">Nothing to show right now…</p>
            @endforelse

        </div>
        <div class="col-md-4">
            <p><b>Stats</b></p>
            <p>{{ $siteCount }} Sites</p>
            <p>{{ $userCount }} Users</p>
            <p>{{ $submissionCount }} URLs</p>
            <p>{{ $heartCount }} Hearts</p>
        </div>
    </div>
@stop
