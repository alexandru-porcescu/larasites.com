<div class="media">
    <div class="media-left" style="padding-left:10px;border-left:5px solid rgb({{ $site->rgb }})">
        <a href="{{ $site->url }}" target="_blank" style="">
            <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 100, 'height' => 100, 'format' => 'png']) }}" width="100" height="100" alt="{{ $site->title }}">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <p>@include('user', ['user' => $site->user])</p>
        <p>{!! Html::linkAction('VotingController@submitVote', $site->votes()->count() . ' Votes', ['site' => $site->id]) !!}</p>
    </div>
</div>
