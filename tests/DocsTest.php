<?php

class DocsTest extends TestCase
{
    /**
     * Make sure the various documentation pages exist.
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
