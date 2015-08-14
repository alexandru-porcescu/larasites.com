@extends('layout', ['title' => 'Submit a site | Larasites.com'])

@section('content')
    <center>
        <h4>Thanks for submitting your work to Larasites!</h4>
        <br>
        <p>{!! Html::link('submit', 'Submit another site', ['class' => 'btn btn-default']) !!}</p>
    </center>
@stop
