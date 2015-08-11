@extends('layout', ['title' => 'Terms & Conditions | Larasites.com'])

@section('content')
<?php
    $text = file_get_contents(base_path('docs/terms-conditions.md'));
    echo \Michelf\Markdown::defaultTransform($text);
?>
@stop
