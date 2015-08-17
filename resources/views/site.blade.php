<div class="media" style="position:relative;padding-left:20px;">
    <div class="media-left" style="">
        <a href="{{ $site->url }}" target="_blank" style="">
            <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 100, 'height' => 100, 'format' => 'png']) }}" width="100" height="100" alt="{{ $site->title }}">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <p>@include('user', ['user' => $site->user])</p>
        @if ($user)
            <p><a href="{{ action('VotingController@submitVote', [$site->id]) }}" class="btn btn-sm {{ $user->votedFor($site) ? 'btn-primary' : 'btn-default' }}"><span class="badge">{{ $site->vote_count }}</span> Vote</a>
        @else
            <p><a href="{{ action('VotingController@submitVote', [$site->id]) }}" class="btn btn-sm btn-default"><span class="badge">{{ $site->vote_count }}</span> Vote</a>
        @endif
    </div>
    <div style="position:absolute;top:0;left:0;width:10px;height:100%;{{ $site->color->getCssGradient() }}"></div>
</div>
