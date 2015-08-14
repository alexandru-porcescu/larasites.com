<p class="text-muted">
    Made by {!! Html::link('http://www.wearenext.co.za', 'Next') !!} in Cape Town |
    {!! Html::link('terms-of-service', 'Terms of Service') !!} |
    {!! Html::link('privacy-policy', 'Privacy Policy') !!} |
    {!! Html::link('contributors-guide', 'Contributors Guide') !!} |
    {!! Html::link('https://github.com/we-are-next/www.larasites.com', 'GitHub') !!}
    @if (Auth::user())
        | {!! Html::linkAction('Auth\AuthController@logout', 'Logout') !!}
    @endif
</p>
