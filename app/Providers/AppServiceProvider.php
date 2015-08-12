<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once(app_path('helpers.php'));

        Validator::extend('url_responds', function($attribute, $value, $parameters) {
            $client = new \GuzzleHttp\Client;
            try {
                $response = $client->get($value);
            } catch (\Exception $e) {
                $code = $e->getResponse()->getStatusCode();
            }
            if (! isset($code)) {
                $code = $response->getStatusCode();
            }
            return $code === 200;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
