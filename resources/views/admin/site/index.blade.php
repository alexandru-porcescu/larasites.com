@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li class="active">sites</li>
    </ol>

    <hr>
    <p class="lead">Sites</p>
    <hr>

    @foreach ($sites as $key => $site)
        @if ($key > 0) <hr> @endif

        <div class="media">
            <div class="media-left">
                <a href="{{ action('Admin\SiteController@show', [$site->id]) }}" target="_blank" style="">
                    <img class="media-object" src="{{ cloudinary_url($site->cloudinary_public_id, ['secure' => true, 'width' => 100]) }}">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{!! Html::linkAction('Admin\SiteController@show', $site->title, [$site->id]) !!}</h4>
                <p>{{ str_limit($site->description, 90) }}</p>
                <small>
                    @if ($site->approved_at)
                        @if ($site->featured_at)
                            {!! Html::linkAction('Admin\SiteController@unfeature', 'Remove Feature', [$site->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                        @else
                            {!! Html::linkAction('Admin\SiteController@feature', 'Feature', [$site->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                        @endif
                        <a href="#" class="btn btn-sm btn-secondary disabled">Approved {!! timeago($site->approved_at) !!}</a>
                    @else
                        {!! Html::linkAction('Admin\SiteController@approve', 'Approve', [$site->id], ['class' => 'btn btn-sm btn-secondary']) !!}
                    @endif
                </small>
            </div>
        </div>
    @endforeach

    <br>

    {!! $sites->render() !!}
@stop
