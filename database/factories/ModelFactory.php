<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(App\User::class, 'admin', function ($faker) {
    return [
        'twitter_id'            => '99999999',
        'twitter_nickname'      => 'testuser',
        'twitter_avatar'        => $faker->imageUrl(64, 64),
        'cloudinary_url'        => $faker->imageUrl(30, 30),
        'cloudinary_secure_url' => $faker->imageUrl(30, 30),
        'is_admin'              => 1,
        'authenticated_at'      => Carbon::now(),
    ];
});


$factory->defineAs(App\User::class, 'default', function ($faker) {
    return [
        'twitter_id'            => '99999999',
        'twitter_nickname'      => 'testuser',
        'twitter_avatar'        => $faker->imageUrl(64, 64),
        'cloudinary_url'        => $faker->imageUrl(30, 30),
        'cloudinary_secure_url' => $faker->imageUrl(30, 30),
        'is_admin'              => 0,
        'authenticated_at'      => Carbon::now(),
    ];
});


