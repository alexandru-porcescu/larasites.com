<div class="row">
    <div class="col-md-8">
        <p><b>{!! Html::link('/', 'Larasites.com') !!}</b> <span class="text-muted">Showcasing the best websites built with Laravel & Lumen.</span></p>
    </div>
    @if (Auth::user())
        <div class="col-md-4 text-right">
            <p>
                {{ '@' . strtolower(Auth::user()->twitter_nickname) }}
                {!! Html::linkAction('Auth\AuthController@logout', 'logout') !!}
            </p>
        </div>
    @endif
</div>
