@extends('layout', ['title' => 'Submissions | Larasites.com'])

@section('content')
    @forelse ($hosts as $host)
        <p>
            <h4>{!! Html::link('http://' . $host->name, $host->name) !!}</h4>
            @foreach ($host->submissions->sortByDesc('created_at')->take(2) as $submission)
                <blockquote>
                    {!! Html::link('https://www.twitter.com/@' . $submission->user->twitter_nickname, '@'.$submission->user->twitter_nickname) !!}
                    submitted
                    {!! Html::link($submission->url) !!}
                    <time class="timeago" datetime="{{ $submission->created_at->toIso8601String() }}"></time>
                </blockquote>
            @endforeach
            @if ($host->submissions->count() > 2)
                <blockquote>+{{ $host->submissions->count() - 2 }} more…</blockquote>
            @endif
            <a href="#" class="btn btn-default btn-sm">Add Site</a>
            <a href="#" class="btn btn-default btn-sm">Remove</a>
        </p>
    @empty
        <p>Nothing has been submitted yet…</p>
    @endforelse
@stop
