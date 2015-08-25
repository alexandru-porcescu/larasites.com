<style type="text/css">
    .site-{{ $site->id }} .card__vote {
        color: {{ '#' . $site->color->getHex() }};
    }
    .site-{{ $site->id }} .card__vote:focus, .site-{{ $site->id }} .card__vote:hover {
        border-color: {{ '#' . $site->color->getHex() }};
    }
    .site-{{ $site->id }} .card__vote.card__vote--voted {
        background-color: {{ '#' . $site->color->getHex() }};
    }
</style>
