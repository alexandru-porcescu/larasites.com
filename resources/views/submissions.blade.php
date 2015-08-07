@extends('layout', ['title' => 'Submissions | Larasites.com'])

@section('content')
@foreach ($submissions as $i => $submission)
    <p>
        {!! Html::link('https://www.twitter.com/@' . $submission->user->twitter_nickname, '@' . $submission->user->twitter_nickname) !!}
        submitted
        {!! Html::link($submission->extraction->url) !!}
        <time class="timeago" datetime="{{ $submission->created_at->toIso8601String() }}"></time>
        <a href="#" class="btn btn-default btn-xs">Approve</a>
    </p>
    @if (isset($submissions[$i + 1])) <hr> @endif
@endforeach
@stop
