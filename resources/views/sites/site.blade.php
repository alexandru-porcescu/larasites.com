<div id="site-{{ $site->id }}" class="card site-{{ $site->id }}">
    <div class="card-header">
        <div class="card__logo">
            <a href="{{ $site->url }}" target="_blank">
                <img src="{{ cloudinary_url($site->cloudinary_public_id, ['crop' => 'scale', 'width' => 150, 'secure' => true, 'format' => 'png']) }}" alt="">
            </a>
        </div>
        <a class="card__vote @if ($user && in_array($site->id, $userVotes, true)) card__vote--voted @endif" href="{{ action('VoteController@submitVote', [$site->id]) }}">
            <span class="icon fa fa-heart" aria-hidden="true"></span> {{ $site->vote_count }}
        </a>
    </div>
    <div class="card-body">
        <h2 class="card__title"><a href="{{ $site->url }}" target="_blank">{{ $site->title }}</a></h2>
        <p class="card__synopsis">{{ $site->description }}</p>
        <div class="meta">
            @include('sites.user')
        </div>
    </div>
</div>
