@extends('layout', ['title' => 'Submissions | Larasites.com'])

@section('content')
    @forelse ($submissions as $i => $submission)
        <p>
            {!! Html::link('https://www.twitter.com/@' . $submission->user->twitter_nickname, '@' . $submission->user->twitter_nickname) !!}
            submitted
            {!! Html::link($submission->extraction->url) !!}
            <time class="timeago" datetime="{{ $submission->created_at->toIso8601String() }}"></time>
            <a href="{{ action('SitesController@showCreateForm', ['submission' => $submission->id]) }}" class="btn btn-default btn-xs">Add Site</a>
        </p>
        @if (isset($submissions[$i + 1])) <hr> @endif
    @empty
        <p>Nothing has been submitted.</p>
    @endforelse
@stop
