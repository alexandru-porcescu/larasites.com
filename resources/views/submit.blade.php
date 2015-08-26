@extends('layout', ['title' => 'Larasites – Submit Your Site'])

@section('content')
    <main class="main" role="main">
        <div class="l-section l-section--background" style="background-image: url('{{ url('assets/images/background-submit-a-site-1722x664.png') }}');">
            <div class="l-wrapper">
                {!! Form::open(['name' => 'form-submit', 'id' => 'form-submit', 'method' => 'post', 'url' => '/submit/submit', 'class' => 'form form--well']) !!}
                    <label class="u-visuallyhidden" for="url">URL</label>
                    <input class="input" type="text" id="url" name="url" placeholder="http://" maxlength="100" value="{{ old('url') }}" autofocus>

                    <input class="btn" type="submit" id="submit" name="submit" value="Submit">
                {!! Form::close() !!}

                @if (count($errors) > 0)
                    <div class="alert alert--error js-alert" role="alert">
                        <p class="alert__message">
                            <b>Oh snap!</b> {{ $errors->first() }}
                        </p>
                    </div>
                @else
                    <div class="alert alert--info js-alert" role="alert">
                        <p class="alert__message"><b>Hey!</b> We feature sites that are functional, performant and pretty. <a href="{{ action('PageController@showContributorsGuide') }}">See our Contributors Guide</a>.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
@stop
