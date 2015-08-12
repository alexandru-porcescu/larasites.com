@extends('layout')

@section('content')
    <p>{!! Html::link('/submit', 'Submit a site', ['class' => 'btn btn-default']) !!}</p>

    @if (Auth::user() && Auth::user()->is_admin && count($unapproved) > 0)
        @foreach ($unapproved as $site)
            <hr>
            <div class="row">
                <div class="col-md-2">
                    {!! Form::open(['url' => action('ApprovalController@submitApproval')]) !!}
                    {!! Form::hidden('site_id', $site->id) !!}
                    {!! Form::submit('Approve', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-md-10">
                    @include('site', compact('site'))
                </div>
            </div>
        @endforeach
    @endif

    @foreach ($sites as $site)
        <hr>
        @include('site', compact('site'))
    @endforeach
@stop
