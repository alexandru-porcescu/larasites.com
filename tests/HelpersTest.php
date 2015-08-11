<?php

use App\User;

class HelpersTest extends TestCase
{
    public function testTwitterUsernameLinks()
    {
        $user = new User;
        $user->twitter_nickname = 'laravelphp';
        $this->assertEquals(
            '<a href="https://www.twitter.com/@laravelphp">@laravelphp</a>',
            tw($user)
        );
    }
}
