<?php

use App\User;

if (! function_exists('tw')) {
    /**
     * @param App\User $user
     * @return string
     */
    function tw(User $user) {
        return Html::link(
            'https://www.twitter.com/@' . $user->twitter_nickname,
            '@' . $user->twitter_nickname
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
