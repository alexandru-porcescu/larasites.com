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

Route::get('/', 'WelcomeController@showWelcome');

Route::get('terms-of-service', 'PageController@showTermsOfService');
Route::get('privacy-policy', 'PageController@showPrivacyPolicy');
Route::get('contributors-guide', 'PageController@showContributorsGuide');

Route::get('auth', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('submit', 'SubmitController@showSubmitForm');
Route::post('submit/submit', 'SubmitController@submitSubmitForm');
Route::get('thank-you', 'SubmitController@showThanks');

Route::get('admin', 'DashboardController@dashboard');
