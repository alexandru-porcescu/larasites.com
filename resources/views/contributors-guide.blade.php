@extends('layout', ['title' => 'Contributors Guide | Larasites.com'])

@section('content')
    {!! md(base_path('docs/contributors-guide.md')) !!}
@stop
