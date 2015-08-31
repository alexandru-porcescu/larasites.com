<?php

use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthTest extends TestCase
{
    public function testAdminRedirect()
    {
        $response = $this->call('GET', '/admin');

        $this->assertEquals(302, $response->status());
    }

    public function testAdminIsDenied()
    {
        $user = new User;

        Auth::login($user);

        $response = $this->call('GET', '/admin');

        $this->assertEquals(404, $response->status());
    }

    public function testAdminIsAllowed()
    {
        Artisan::call('migrate');

        $user = new User;
        $user->is_admin = 1;

        $this->actingAs($user)->visit('/admin')->see('admin');
    }
}
