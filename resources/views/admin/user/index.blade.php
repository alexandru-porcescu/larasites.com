@extends('admin.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/"><b>Larasites.com</b></a></li>
        <li><a href="{{ action('Admin\DashboardController@index') }}">admin</a></li>
        <li class="active">users</li>
    </ol>

    <hr><p class="lead">Users</p><hr>

    @foreach ($users as $key => $user)
        @if ($key > 0) <hr> @endif
        <div class="media">
            <a class="media-left" href="{{ action('Admin\UserController@show', [$user->twitter_id]) }}">
                <img class="media-object img-circle" width="60" src="{{ $user->cloudinary_secure_url }}">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ '@' . $user->twitter_nickname }}</h4>
                <p>Joined {!! timeago($user->created_at) !!}</p>
            </div>
        </div>
    @endforeach

    <br>

    {!! $users->render() !!}
@stop
