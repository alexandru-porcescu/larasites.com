@extends('layout', ['title' => 'Terms of Service | Larasites.com'])

@section('content')
<?php
    $text = file_get_contents(base_path('docs/terms-of-service.md'));
    echo \Michelf\Markdown::defaultTransform($text);
?>
@stop
