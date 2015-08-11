@extends('layout', ['title' => 'Terms of Service | Larasites.com'])

@section('content')
    {!! md(base_path('docs/terms-of-service.md')) !!}
@stop
