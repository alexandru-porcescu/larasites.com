<div id="site-{{ $site->id }}" class="card site-{{ $site->id }}">
    <div class="card-header">
        <div class="card__logo">
            <a href="{{ $site->url }}">
                <img src="{{ cloudinary_url($site->cloudinary_public_id, ['crop' => 'scale', 'width' => 150, 'secure' => true, 'format' => 'png']) }}" alt="">
            </a>
        </div>
        <a class="card__vote @if (Auth::user() && Auth::user()->votedFor($site)) card__vote--voted @endif" href="{{ action('VotingController@submitVote', [$site->id]) }}">
            <span class="icon fa fa-heart" aria-hidden="true"></span> {{ $site->vote_count }}
        </a>
    </div>
    <div class="card-body">
        <h2 class="card__title"><a href="{{ $site->url }}">{{ $site->title }}</a></h2>
        <p class="card__synopsis">{{ $site->description }}</p>
        <div class="meta">
            @if ($site->user->cloudinary_public_id)
                {!! Html::image(cloudinary_url($site->user->cloudinary_public_id, ['secure' => true, 'format' => 'jpg', 'width' => 30, 'height' => 30]), '@' . $site->user->twitter_nickname, ['width' => 30, 'height' => 30, 'class' => 'meta__img']) !!}
            @elseif ($site->user->twitter_avatar)
                {!! Html::image($site->user->twitter_avatar, '@' . $site->user->twitter_nickname, ['width' => 30, 'height' => 30, 'class' => 'meta__img']) !!}
            @endif
            <p class="meta__synopsis">
                <a href="{{ $site->url }}">
                    {{ League\Url\Url::createFromUrl($site->url)->getHost() }}</a>
                    submitted by
                    <a href="https://twitter.com/{{ $site->user->twitter_nickname }}">{{ '@' . $site->user->twitter_nickname }}
                </a>
            </p>
        </div>
    </div>
</div>
