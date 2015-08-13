<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Host;
use App\Submission;

class SubmissionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = new User;
        $user->twitter_id = 1337;
        $user->twitter_nickname = 'test';
        $user->twitter_avatar = '...';
        $user->twitter_avatar_original = '...';
        $user->save();

        $this->actingAs($user)
            ->visit('/submit')
            ->type('http://laravel.com', 'url')
            ->press('Submit')
            ->seePageIs('/thank-you');

        $this->assertEquals(1, Host::count());
        $this->assertEquals(1, Submission::count());

        $this->assertEquals('laravel.com', Host::first()->name);
    }
}
