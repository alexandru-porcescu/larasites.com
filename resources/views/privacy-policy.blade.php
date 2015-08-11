@extends('layout', ['title' => 'Privacy Policy | Larasites.com'])

@section('content')
<?php
    $text = file_get_contents(base_path('docs/privacy-policy.md'));
    echo \Michelf\Markdown::defaultTransform($text);
?>
@stop
