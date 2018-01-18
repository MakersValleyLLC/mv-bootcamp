<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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

//Route to show user's update method
Route::put('/users/update/{id}', 'UsersController@update');

//Route to show user's delete method
Route::get('/users/delete/{id}', 'UsersController@destroy');

//Route to create a user
Route::post('/users/create/user', 'UsersController@create');

//Route to log in
Route::post('users/login', 'UsersController@login');

//Route to logout
Route::get('users/logout', 'UsersController@logout');