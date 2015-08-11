@extends('layout', ['title' => 'Add Site | Larasites.com'])

@section('content')
    @foreach ($host->submissions->take(3) as $submission)
        <p>{!! Html::link($submission->url) !!} was submitted by {!! tw($submission->user) !!} <time class="timeago" datetime="{{ $submission->created_at->toIso8601String() }}"></time></p>
    @endforeach
    <hr>
    {!! Form::open(['method' => 'post', 'url' => action('SitesController@submitCreateForm')]) !!}
    {!! Form::hidden('host', $host->name) !!}
    <div class="form-group">
        <label>URL</label>
        {!! Form::text('url', $host->url, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label>Title</label>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label>Description</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
    <hr>
    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop
