<?php

use App\User;

if (! function_exists('tw')) {
    function tw(User $user) {
        return Html::link(
            'https://www.twitter.com/@' . $user->twitter_nickname,
            '@' . $user->twitter_nickname
        );
    }
}
