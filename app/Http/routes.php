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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('submit', 'SubmitController@showSubmitForm');
Route::post('submit/submit', 'SubmitController@submitSubmitForm');
Route::get('submit/thanks', 'SubmitController@showThankyouPage');

Route::get('queue', function () {
    return \App\Extraction::all();
});
