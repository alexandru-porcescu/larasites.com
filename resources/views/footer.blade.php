<footer class="footer footer--primary" role="contentinfo">
    <div class="l-wrapper">
        <nav class="nav nav--vertical" role="navigation">
            <div class="row">
                <div class="col col-1-3">
                    <div class="header header--section">
                        <h6 class="hN">About</h6>
                    </div>

                    <p>Larasites is a showcase of the world’s best Laravel and Lumen powered websites. We’re constantly
                       amazed by what people are doing with Laravel. So, get inspired. Ship something and share it
                       here.</p>
                    <div class="social">
                        <a class="social__link" href="https://github.com/we-are-next/www.larasites.com" title="Contribute on GitHub"><span class="icon fa fa-github" aria-hidden="true"></span></a>
                        <a class="social__link" href="https://twitter.com/larasites" title="Follow us on Twitter"><span class="icon fa fa-twitter" aria-hidden="true"></span></a>
                    </div>
                </div>

                <div class="col col-1-3">
                    <div class="header header--section">
                        <h6 class="hN">Community</h6>
                    </div>

                    <div class="row">
                        <div class="col col-1-2">
                            <ol class="list">
                                <li><a href="http://laravel.com">Laravel</a></li>
                                <li><a href="http://lumen.laravel.com">Lumen</a></li>
                                <li><a href="https://laracasts.com">Laracasts</a></li>
                                <li><a href="https://larajobs.com">Larajobs</a></li>
                                <li><a href="https://laramap.com">Laramap</a></li>
                            </ol>
                        </div>
                        <div class="col col-1-2">
                            <ol class="list">
                                <li><a href="https://laravel-news.com">Laravel News</a></li>
                                <li><a href="http://www.laravelpodcast.com">Laravel Podcast</a></li>
                                <li><a href="http://laravel.io">Laravel.io</a></li>
                                <li><a href="https://larachat.co">Larachat</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col col-1-3">
                    <div class="header header--section">
                        <h6 class="hN">Legal</h6>
                    </div>

                    <ol class="list">
                        <li><a href="{{ action('DocsController@showTermsOfService') }}">Terms of Service</a></li>
                        <li><a href="{{ action('DocsController@showPrivacyPolicy') }}">Privacy Policy</a></li>
                        <li><a href="{{ action('DocsController@showContributorsGuide') }}">Contributors Guide</a></li>
                    </ol>
                </div>
            </div>
        </nav>

        <img class="logo" src="{{ url('assets/images/next-loves-laravel-78x28.png') }}" srcset="{{ url('assets/images/next-loves-laravel-156x56.png') }} 2x" width="78" height="28" alt="Next ♥ Laravel">

        <p class="u-align--center">
            <small>Made by <a href="http://www.wearenext.co.za">Next</a> in Cape Town, South Africa for <a href="http://laravel.com">Laravel</a> heads everywhere.</small>
        </p>
    </div>
</footer>
