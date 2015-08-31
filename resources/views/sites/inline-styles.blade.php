<style type="text/css">
    .site-{{ $site->id }} .card__vote {
        color: {{ $site->rgbCss }};
    }
    .site-{{ $site->id }} .card__vote:focus, .site-{{ $site->id }} .card__vote:hover {
        border-color: {{ $site->rgbCss }};
    }
    .site-{{ $site->id }} .card__vote.card__vote--voted {
        background-color: {{ $site->rgbCss }};
    }
    .site-{{ $site->id }} .card__vote.card__vote--voted:focus, .site-{{ $site->id }} .card__vote.card__vote--voted:hover {
        color: {{ $site->rgbCss }};
    }
</style>
