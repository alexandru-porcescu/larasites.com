@if ($user->cloudinary_public_id)
    {!! Html::image(cloudinary_url($user->cloudinary_public_id, ['secure' => true, 'format' => 'jpg', 'width' => 20, 'height' => 20]), null, ['width' => 20, 'class' => 'img-circle']) !!}
@elseif ($user->twitter_avatar)
    {!! Html::image($user->twitter_avatar, null, ['width' => 20, 'class' => 'img-circle']) !!}
@endif
{!! Html::link('https://www.twitter.com/@' . $user->twitter_nickname, '@' . $user->twitter_nickname, ['target' => '_blank']) !!}
