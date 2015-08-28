<?php

class DocsTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPagesRespond()
    {
        $this->visit('/terms-of-service')->see('Terms of Service');
        $this->visit('/privacy-policy')->see('Privacy Policy');
        $this->visit('/contributors-guide')->see('Contributors Guide');
    }
}
