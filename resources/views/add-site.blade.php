@extends('layout', ['title' => 'Add Site | Larasites.com'])

@section('content')
    @foreach ($host->submissions->take(3) as $submission)
        <p>{!! Html::link($submission->url) !!} was submitted by {!! tw($submission->user) !!} <time class="timeago" datetime="{{ $submission->created_at->toIso8601String() }}"></time></p>
    @endforeach

    <hr>

    <a class="embedly-card" href="{{ $host->url }}">Embedly Preview</a>
    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
    {!! Html::link('http://embed.ly/docs/explore/extract?url=' . $host->url, 'View source', ['target' => '_blank']) !!}

    <hr>

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

    {!! Form::open(['method' => 'post', 'url' => action('SitesController@submitCreateForm')]) !!}
    {!! Form::hidden('host', $host->name) !!}

    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
        <label class="control-label">URL</label>
        {!! Form::text('url', $host->url, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label class="control-label">Description</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>

    <div class="form-group {{ $errors->has('image_url') ? 'has-error' : '' }}">
        <label class="control-label">Image URL</label>
        {!! Form::text('image_url', 'https://logo.clearbit.com/' . $host->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{ $errors->has('red') || $errors->has('green') || $errors->has('blue') ? 'has-error' : '' }}">
        <label class="control-label">RGB</label>
        <div class="form-inline">
            {!! Form::text('red', null, ['class' => 'form-control']) !!}
            {!! Form::text('green', null, ['class' => 'form-control']) !!}
            {!! Form::text('blur', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <hr>
    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop
