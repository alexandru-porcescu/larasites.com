<div class="row">
    <div class="col-md-8">
        <p><b>{!! Html::link('/', 'Larasites.com') !!}</b> <span class="text-muted">Showcasing the best websites built with Laravel & Lumen.</span></p>
    </div>
    @if (Auth::user())
        <div class="col-md-4 text-right">
            <p>{{ '@' . strtolower(Auth::user()->twitter_nickname) }}</p>
        </div>
    @endif
</div>
