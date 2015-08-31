<?php

class SeederTest extends TestCase
{
    /**
     * A simple test to make sure  the database migrations and seeders can run
     * without throwing exceptions.
     *
     * @return void
     */
    public function testMigrateCommand()
    {
        Artisan::call('migrate:refresh', ['seed']);
    }
}
