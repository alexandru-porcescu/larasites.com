<nav class="nav nav--horizontal" role="navigation">
    <div class="l-wrapper">
        <ol class="list">
            <li class="{{ cx(['is-active' => Request::is('/') && Input::get('order') !== 'popular']) }}"><a href="/">Latest</a></li>
            <li class="{{ cx(['is-active' => Request::is('/') && Input::get('order') === 'popular']) }}"><a href="/?order=popular">Popular</a></li>
        </ol>
    </div>
</nav>
