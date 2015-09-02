<?php

use App\Site;

class SitemapTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        Artisan::call('migrate');

        $res = $this->call('GET', '/sitemap.xml');

        $this->assertEquals(200, $res->getStatusCode());
    }
}
