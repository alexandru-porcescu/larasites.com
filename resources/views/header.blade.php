<header class="header header--primary" role="banner">
    <div class="l-wrapper">
        <a class="logo" href="{{ url('/') }}">
            <img src="{{ url('assets/images/logo-larasites-162x53.png') }}" srcset="{{ url('assets/images/logo-larasites-324x106.png') }} 2x" width="162" height="53" alt="Larasites logo">
        </a>
        @if (Auth::user())
            <div class="user">
                @if (Auth::user()->cloudinary_public_id)
                    {!! Html::image(cloudinary_url(Auth::user()->cloudinary_public_id, ['secure' => true, 'format' => 'jpg', 'width' => 43, 'height' => 43]), '@' . Auth::user()->twitter_nickname, ['width' => 43, 'height' => 43, 'class' => 'user__img']) !!}
                @elseif (Auth::user()->twitter_avatar)
                    {!! Html::image(Auth::user()->twitter_avatar, '@' . Auth::user()->twitter_nickname, ['width' => 43, 'height' => 43, 'class' => 'user__img']) !!}
                @endif

                <a class="user__link" href="{{ action('Auth\AuthController@logout') }}">Log out</a>
            </div>
        @endif
        <a class="btn btn--white btn--icon" href="{{ action('SubmitController@showSubmitForm') }}">
            <span class="icon icon--left fa fa-twitter" aria-hidden="true"></span> Submit <span class="u-hide--small">a Site</span>
        </a>
        <h1 class="strapline">The world’s best websites made with <strong>Laravel</strong></h1>
    </div>
</header>
