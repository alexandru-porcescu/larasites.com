<?php

use Artisan;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        Artisan::call('migrate');
        
        $this->visit('/')->see('Larasites');
        $this->visit('/')->see('Submit');
    }
}
