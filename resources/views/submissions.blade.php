@foreach ($submissions as $submission)
    {!! Html::link('https://www.twitter.com/@' . $submission->user->twitter_nickname, '@' . $submission->user->twitter_nickname) !!} submitted {!! Html::link($submission->url) !!}
    <hr>
@endforeach
