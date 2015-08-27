<div class="media">
    <div class="media-left">
        <a href="{{ $site->url }}" target="_blank" style="">
            <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 150]) }}">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{!! Html::link($site->url, $site->title) !!}</h4>
        <p>{{ $site->description }}</p>
        <small>
            <p class="text-muted">{!! Html::image($site->user->twitter_avatar, null, ['width' => 20, 'class' => 'img-circle']) !!} Submitted by {!! tw($site->user) !!}</p>
        </small>
        {!! Html::linkAction('Admin\SiteController@edit', 'Edit', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}

        @if ($site->approved_at)
            <a href="#" class="btn btn-sm btn-secondary disabled">Approved {!! timeago($site->approved_at) !!}</a>
            {!! Html::linkAction('Admin\SiteController@unapprove', 'Unapprove', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
        @else
            {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
        @endif
    </div>
</div>

