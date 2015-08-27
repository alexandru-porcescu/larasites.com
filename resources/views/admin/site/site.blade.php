<div class="media">
    <div class="media-left">
        <a href="{{ action('Admin\SiteController@show', [$site->id]) }}" target="_blank" style="">
            <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 100]) }}">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{!! Html::linkAction('Admin\SiteController@show', $site->title, [$site->id]) !!}</h4>
        <p>{{ $site->description }}</p>
        <small>
            <p class="text-muted">Submitted by {!! Html::linkAction('Admin\UserController@show', '@' . $site->user->twitter_nickname, [$site->user->twitter_id]) !!}</p>
        </small>
    </div>
</div>

