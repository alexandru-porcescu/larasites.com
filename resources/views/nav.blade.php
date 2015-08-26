<nav class="nav nav--horizontal" role="navigation">
    <div class="l-wrapper">
        <ol class="list">
            <li class="{{ cx(['is-active' => Request::is('/')]) }}">
                <a href="/">Featured</a>
            </li>
            <li class="{{ cx(['is-active' => Request::is('latest')]) }}">
                <a href="{{ action('SitesController@showLatest') }}">Latest</a>
            </li>
            <li class="{{ cx(['is-active' => Request::is('popular')]) }}">
                <a href="{{ action('SitesController@showPopular') }}">Popular</a>
            </li>
        </ol>
    </div>
</nav>
