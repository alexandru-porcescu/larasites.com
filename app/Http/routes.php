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

Route::get('auth', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('submit', 'SubmitController@showSubmitForm');
Route::post('submit/submit', 'SubmitController@submitSubmitForm');
Route::get('submit/thanks', 'SubmitController@showThanks');

Route::get('admin', 'SubmissionsController@showSubmissions');
Route::get('hosts/{id}/trash', 'SubmissionsController@trashHost');

Route::get('add-site', 'SitesController@showCreateForm');
Route::post('add-site/submit', 'SitesController@submitCreateForm');

Route::post('approve', 'ApprovalController@submitApproval');

Route::get('terms-of-service', function () {
    return view('terms-of-service');
});

Route::get('privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('contributors-guide', function () {
    return view('contributors-guide');
});
