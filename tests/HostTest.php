<?php

use App\Host;

class HostTest extends TestCase
{
    public function testUrlAttribute()
    {
        $host = new Host;
        $host->name = 'laravel.com';
        $this->assertEquals(
            'http://laravel.com',
            $host->url
        );
    }
}
