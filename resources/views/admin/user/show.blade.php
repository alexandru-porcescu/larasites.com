@extends('admin.layout')

@section('content')
    <p class="lead">{!! tw($user) !!}</p>
    <hr>

    <p><b>Details</b></p>
    <p>Joined {!! timeago($user->created_at) !!}</p>
    <p>Last authenticated {!! timeago($user->created_at) !!}</p>

    <br>

    <p><b>Submissions</b></p>
    @forelse ($submissions as $submission)
        <p>
            {!! tw($user) !!}
            submitted {!! Html::link($submission->url, null, ['target' => '_blank']) !!} {!! timeago($submission->created_at) !!}
        </p>
    @empty
    @endforelse
@stop
