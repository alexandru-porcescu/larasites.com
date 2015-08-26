<?php

class RobotsTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/robots.txt');

        $this->assertEquals(200, $response->status());
    }
}
