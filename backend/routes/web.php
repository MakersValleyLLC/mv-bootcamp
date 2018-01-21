<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

//TEST
Route::get('/test', function () {
    return view('test.test');
});

// USERS CONTROLLERS ENDPOINTS

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/oauth/authorize', [
    'uses' => 'AuthorizationController@authorize',
]);


