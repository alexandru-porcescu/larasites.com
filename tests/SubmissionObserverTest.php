<?php

use App\Host;
use App\Submission;

class SubmissionObserverTest extends TestCase
{
    public function testHostCreation()
    {
        Artisan::call('migrate');

        $submission = new Submission;
        $submission->url = 'https://laracasts.com/';
        $submission->user_id = 1;
        $submission->save();

        $hosts = Host::all();

        $this->assertEquals(1, count($hosts));
    }

    public function testNoDuplicates()
    {
        Artisan::call('migrate');

        $submission = new Submission;
        $submission->url = 'https://laracasts.com/';
        $submission->user_id = 1;
        $submission->save();

        $submission2 = new Submission;
        $submission2->url = 'http://laracasts.com';
        $submission2->user_id = 1;
        $submission2->save();

        $hosts = Host::all();

        $this->assertEquals(1, count($hosts));
    }
}
