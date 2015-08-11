@extends('layout', ['title' => 'Contributors Guide | Larasites.com'])

@section('content')
<?php
    $text = file_get_contents(base_path('docs/contributors-guide.md'));
    echo \Michelf\Markdown::defaultTransform($text);
?>
@stop
