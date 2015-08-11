@extends('layout', ['title' => 'Submissions | Larasites.com'])

@section('content')
    @forelse ($hosts as $i => $host)
        <p>
            <h4>{!! Html::link('http://' . $host->name, $host->name) !!}</h4>
            <ul>
                @foreach ($host->submissions->sortByDesc('created_at')->take(2) as $submission)
                    <li>
                        {!! tw($submission->user) !!} submitted {!! Html::link($submission->url) !!}
                        <time class="timeago" datetime="{{ $submission->created_at->toIso8601String() }}"></time>
                    </li>
                @endforeach
                @if ($host->submissions->count() > 2)
                    <li>+{{ $host->submissions->count() - 2 }} more</li>
                @endif
            </ul>
            <a href="#" class="btn btn-default btn-sm">Add Site</a>
            {!! Html::linkAction('SubmissionsController@trashHost', 'Trash Host', [$host->id], ['class' => 'btn btn-default btn-sm']) !!}
        </p>
        @if (isset($hosts[$i + 1])) <hr> @endif
    @empty
        <p>Waiting on new submissions…</p>
    @endforelse
@stop
