@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li>{!! Html::linkAction('Admin\UserController@index', 'users') !!}</li>
        <li class="active">{{ '@' . $user->twitter_nickname }}</li>
    </ol>

    <hr>
    <p class="lead">{{ '@' . $user->twitter_nickname }}</p>
    <hr>

    <div class="row">
        <div class="col-md-3">
            {!! Html::image($user->twitter_avatar_original, null, ['class' => 'img-responsive img-circle']) !!}
        </div>
        <div class="col-md-9">
            <p><b>Details</b></p>
            <p>Joined {!! timeago($user->created_at) !!}</p>
            <p>Last authenticated {!! timeago($user->created_at) !!}</p>
            <p>{!! Html::link('https://www.twitter.com/' . $user->twitter_nickname, 'View on Twitter', ['class' => 'btn btn-sm btn-secondary', 'target' => '_blank']) !!}</p>

            <br>

            <p><b>Activity</b></p>
            @foreach ($votes as $vote)
                <p>
                    {!! tw($user) !!}
                    voted for {!! Html::linkAction('Admin\SiteController@show', $vote->site->title, [$vote->site->title]) !!} {!! timeago($vote->created_at) !!}
                </p>
            @endforeach

            @foreach ($submissions as $submission)
                <p>
                    {!! tw($user) !!}
                    submitted {!! Html::link($submission->url, null, ['target' => '_blank']) !!} {!! timeago($submission->created_at) !!}
                </p>
            @endforeach
        </div>
    </div>
@stop
