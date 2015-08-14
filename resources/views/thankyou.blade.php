@extends('layout', ['title' => 'Submit a site | Larasites.com'])

@section('content')
    <p>Thanks for submitting your work to Larasites!</p>
    <p>{!! Html::link('submit', 'Submit another site', ['class' => 'btn btn-default']) !!}</p>
@stop
