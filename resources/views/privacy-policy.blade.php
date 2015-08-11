@extends('layout', ['title' => 'Privacy Policy | Larasites.com'])

@section('content')
    {!! md(base_path('docs/privacy-policy.md')) !!}
@stop
