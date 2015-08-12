<div class="media">
    <div class="media-left" style="padding-left:10px;border-left:5px solid rgb({{ $site->rgb }})">
        <a href="{{ $site->url }}" target="_blank" style="">
            <img class="media-object" src="{{ cloudinary_url($site->image_name, ['secure' => true, 'width' => 150, 'height' => 150, 'format' => 'png']) }}" width="150" height="150" alt="{{ $site->title }}">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <p>{!! Html::image($site->user->twitter_avatar, null, ['width' => 20, 'class' => 'img-circle']) !!} {!! tw($site->user) !!}</p>
    </div>
</div>
