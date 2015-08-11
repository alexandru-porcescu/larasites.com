<?php

class LegalTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPagesRespond()
    {
        $this->visit('/terms-of-service')->see('<h1>Terms of Service</h1>');
        $this->visit('/privacy-policy')->see('<h1>Privacy Policy</h1>');
        $this->visit('/contributors-guide')->see('<h1>Contributors Guide</h1>');
    }
}
