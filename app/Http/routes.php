<?php

/*
|--------------------------------------------------------------------------
| Larasites.com routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'SitesController@showFeatured');

Route::get('/latest', 'SitesController@showLatest');

Route::get('/popular', 'SitesController@showPopular');

Route::get('/sites/{slug}', 'SiteDetailController@show');

Route::get('auth', 'Auth\AuthController@redirectToProvider');

Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('logout', 'Auth\AuthController@logout');

Route::get('vote/{site}', 'VoteController@submitVote');

Route::get('submit', 'SubmitController@showSubmitForm');

Route::post('submit/submit', 'SubmitController@submitSubmitForm');

Route::get('thank-you', 'SubmitController@showThanks');

Route::get('terms-of-service', 'DocsController@showTermsOfService');

Route::get('privacy-policy', 'DocsController@showPrivacyPolicy');

Route::get('contributors-guide', 'DocsController@showContributorsGuide');

Route::get('sitemap.xml', 'SitemapController@index');

$opts = [
    'namespace'  => 'Admin',
    'prefix'     => 'admin',
    'middleware' => [
        'auth',
        'admin'
    ]
];

Route::group($opts, function () {
    Route::get('/', 'DashboardController@index');

    Route::resource('host', 'HostController', ['only' => ['index', 'show', 'destroy']]);

    Route::get('site/{site}/approve', 'SiteController@approve');

    Route::get('site/{site}/unapprove', 'SiteController@unapprove');

    Route::get('site/{site}/feature', 'SiteController@feature');

    Route::get('site/{site}/unfeature', 'SiteController@unfeature');

    Route::resource('site', 'SiteController', ['except' => ['destroy']]);

    Route::resource('user', 'UserController', ['only' => ['show', 'index', 'create', 'store']]);
});
