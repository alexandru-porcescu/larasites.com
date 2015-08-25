<header class="header header--primary" role="banner">
    <div class="l-wrapper">
        <a class="logo" href="{{ url('/') }}">
            <img src="{{ url('assets/images/logo-larasites-162x53.png') }}" srcset="{{ url('assets/images/logo-larasites-324x106.png') }} 2x" width="162" height="53" alt="Larasites logo">
        </a>
        <a class="btn btn--white btn--icon" href="{{ action('SubmitController@showSubmitForm') }}">
            <span class="icon icon--left fa fa-twitter" aria-hidden="true"></span> Submit <span class="u-hide--small">a Site</span>
        </a>
        <h1 class="strapline">The world’s best websites made with <strong>Laravel</strong>.</h1>
    </div>
</header>
