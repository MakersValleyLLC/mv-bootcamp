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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//USER CONTROLLER
Route::resource('users', 'UsersController');


//This Middleware protects the DB of users asking for permission to request the users
Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->users();
});


//Route to show user's show method
Route::get('users/show/{id}', 'UsersController@show');

//Route to show user's updatge method
Route::get('/users/edit', 'UsersController@edit');

//Route to show user's updatge method
Route::put('/users/update', 'UsersController@update');

//Route to show user's updatge method
Route::get('/users/delete/{id}', 'UsersController@destroy');