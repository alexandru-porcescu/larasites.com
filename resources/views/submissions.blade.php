@extends('layout', ['title' => 'Submissions | Larasites.com'])

@section('content')
@foreach ($submissions as $i => $submission)
    {!! Html::link('https://www.twitter.com/@' . $submission->user->twitter_nickname, '@' . $submission->user->twitter_nickname) !!}
    submitted
    {!! Html::link($submission->extraction->url) !!}
    @if (isset($submissions[$i + 1]))
        <hr>
    @endif
@endforeach
@stop
