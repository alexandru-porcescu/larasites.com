<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'SitesController@showFeatured');
Route::get('/latest', 'SitesController@showLatest');
Route::get('/popular', 'SitesController@showPopular');

Route::get('terms-of-service', 'PageController@showTermsOfService');
Route::get('privacy-policy', 'PageController@showPrivacyPolicy');
Route::get('contributors-guide', 'PageController@showContributorsGuide');

Route::get('auth', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('submit', 'SubmitController@showSubmitForm');
Route::post('submit/submit', 'SubmitController@submitSubmitForm');
Route::get('thank-you', 'SubmitController@showThanks');

Route::get('vote/{site}', 'VotingController@submitVote');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('host', 'HostController', ['only' => ['show', 'destroy']]);
    Route::get('site/{site}/approve', 'SiteController@approve');
    Route::get('site/{site}/unapprove', 'SiteController@unapprove');
    Route::resource('site', 'SiteController', ['except' => ['destroy']]);
    Route::resource('user', 'UserController', ['only' => ['show', 'index']]);
});
