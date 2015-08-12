<?php

use App\User;
use Carbon\Carbon;

if (! function_exists('tw')) {
    /**
     * @param App\User $user
     * @return string
     */
    function tw(User $user) {
        return Html::link(
            'https://www.twitter.com/@' . $user->twitter_nickname,
            '@' . $user->twitter_nickname,
            ['target' => '_blank']
        );
    }
}

if (! function_exists('md')) {
    /**
     * @param string $file
     * @return string
     */
    function md($file) {
        $text = file_get_contents($file);
        return \Michelf\Markdown::defaultTransform($text);
    }
}

if (! function_exists('timeago')) {
    /**
     * @param \Carbon\Carbon
     * @return string
     */
    function timeago(Carbon $date) {
        return '<time class="timeago" datetime="' . $date->toIso8601String() . '">' . $date->toIso8601String() . '</time>';
    }
}
