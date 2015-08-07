@extends('layout', ['title' => 'Add Site | Larasites.com'])

@section('content')
    {!! Form::open(['method' => 'post', 'url' => action('SitesController@submitCreateForm')]) !!}
    <div class="form-group">
        <label>URL</label>
        {!! Form::text('url', $submission->extraction->url, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label>Title</label>
        {!! Form::text('title', $submission->extraction->body['title'], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label>Description</label>
        {!! Form::textarea('description', $submission->extraction->body['description'], ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
    {!! Form::submit(null, ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop
