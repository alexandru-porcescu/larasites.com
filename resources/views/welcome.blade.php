@extends('layout')

@section('content')
 <nav class="nav nav--horizontal" role="navigation">
    <div class="l-wrapper">
        <ol class="list">
            <li class="{{ cx(['is-active' => Input::get('order') !== 'popular']) }}"><a href="/">Latest</a></li>
            <li class="{{ cx(['is-active' => Input::get('order') === 'popular']) }}"><a href="/?order=popular">Popular</a></li>
        </ol>
    </div>
</nav>

<main class="main" role="main">
    <div class="l-section">
        <div class="l-wrapper">
            <div class="cards">
                @foreach ($sites as $site)
                    <div class="card">
                        <div class="card__logo" style="background-color: {{ '#'.$site->color->getHex() }}">
                            <a href="{{ $site->url }}">
                                <img src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 150, 'height' => 150, 'format' => 'png']) }}" width="150" height="150" alt="">
                            </a>
                            <div class="card-vote">
                                <a class="card-vote__link" href="{{ action('VotingController@submitVote', [$site->id]) }}">
                                    <span class="icon fa fa-heart" aria-hidden="true"></span>
                                    <span class="card-vote__count">{{ $site->vote_count }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-contents">
                            <h2 class="card__title">
                                <a href="{{ $site->url }}">{{ $site->title }}</a>
                            </h2>
                            <p class="card__synopsis">{{ $site->description }}</p>
                            <div class="meta">
                                @if ($site->user->cloudinary_public_id)
                                    {!! Html::image(cloudinary_url($site->user->cloudinary_public_id, ['secure' => true, 'format' => 'jpg', 'width' => 30, 'height' => 30]), '@' . $site->user->twitter_nickname, ['width' => 30, 'height' => 30, 'class' => 'meta__img']) !!}
                                @elseif ($site->user->twitter_avatar)
                                    {!! Html::image($site->user->twitter_avatar, '@' . $site->user->twitter_nickname, ['width' => 30, 'height' => 30, 'class' => 'meta__img']) !!}
                                @endif
                                <p class="meta__synopsis">
                                    <a href="{{ $site->url }}">{{ $site->host }}</a> submitted by <a href="https://twitter.com/{{ $site->user->twitter_nickname }}">{{ '@' . $site->user->twitter_nickname }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- .cards -->
        </div><!-- .l-wrapper -->
    </div><!-- .l-section -->
</main>
@stop
