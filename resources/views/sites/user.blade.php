@if ($site->builder)
    @if ($site->builder->cloudinary_public_id)
        {!! Html::image(cloudinary_url($site->builder->cloudinary_public_id, ['secure' => true, 'format' => 'jpg', 'width' => 30, 'height' => 30]), '@' . $site->builder->twitter_nickname, ['width' => 30, 'height' => 30, 'class' => 'meta__img']) !!}
    @endif
@else
    @if ($site->user->cloudinary_public_id)
        {!! Html::image(cloudinary_url($site->user->cloudinary_public_id, ['secure' => true, 'format' => 'jpg', 'width' => 30, 'height' => 30]), '@' . $site->user->twitter_nickname, ['width' => 30, 'height' => 30, 'class' => 'meta__img']) !!}
    @endif
@endif

<p class="meta__synopsis">
    <a href="{{ $site->url }}" target="_blank">
        {{ League\Url\Url::createFromUrl($site->url)->getHost() }}</a>
        @if ($site->builder)
            created by <a href="https://twitter.com/{{ $site->builder->twitter_nickname }}">{{ '@' . $site->builder->twitter_nickname }}</a>,
        @endif
        submitted by <a href="https://twitter.com/{{ $site->user->twitter_nickname }}">{{ '@' . $site->user->twitter_nickname }}</a>
    </a>
</p>
