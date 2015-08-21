@extends('layout', ['title' => 'Larasites - Thank you!'])

@section('content')
<div class="l-section l-section--flat">
    <div class="l-wrapper l-wrapper--center">
        <img class="l-image" src="{{ url('assets/images/high-five-855x211.gif') }}" width="855" height="211" alt="Eureka!">

        <p>We’re reviewing your submission and will tweet you when your Larasite is up.</p>

        <a class="btn btn--icon" href="https://twitter.com/intent/tweet?text=Larasites – Showcasing the best websites made using Laravel and Lumen https%3A%2F%2Fwww.larasites.com&via=larasites" target="_blank">
            <span class="icon icon--left fa fa-twitter" aria-hidden="true"></span> Spread the word
        </a>
    </div>
</div>
@stop
