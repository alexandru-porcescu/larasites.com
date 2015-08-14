@extends('admin.layout')

@section('content')
    <div class="media">
        <div class="media-left">
            <a href="#" target="_blank" style="">
                <img class="media-object img-circle" src="{{ $user->twitter_avatar_original }}" height="50">
            </a>
        </div>
        <div class="media-body">
            <p class="lead">{!! tw($user) !!}</p>
        </div>
    </div>

    <hr>
    <br>

    <p><b>Details</b></p>
    <p>Joined {!! timeago($user->created_at) !!}</p>
    <p>Last authenticated {!! timeago($user->created_at) !!}</p>

    <br>

    <p><b>Votes</b></p>
    @forelse ($votes as $vote)
        <p>
            {!! tw($user) !!}
            voted for {!! Html::linkAction('Admin\SiteController@show', $vote->site->title, [$vote->site->title]) !!} {!! timeago($vote->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse

    <br>

    <p><b>Submissions</b></p>
    @forelse ($submissions as $submission)
        <p>
            {!! tw($user) !!}
            submitted {!! Html::link($submission->url, null, ['target' => '_blank']) !!} {!! timeago($submission->created_at) !!}
        </p>
    @empty
        <p class="text-muted">Nothing to show right now…</p>
    @endforelse
@stop
