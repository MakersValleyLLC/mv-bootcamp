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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'ApiLoginController@login');


//Route to show user's show method
Route::post('users/show', 'UsersController@show');

//Route to show user's update method
Route::put('/users/update', 'UsersController@update');

//Route to show user's delete method
Route::post('/users/delete', 'UsersController@destroy');

//Route to create a user
Route::post('/users/create/user', 'UsersController@create');

//Route to log in
Route::post('users/login', 'UsersController@login');

//Route to logout
<<<<<<< HEAD
Route::post('users/logout', 'UsersController@logout');
||||||| merged common ancestors
Route::get('users/logout', 'UsersController@logout');
=======
Route::get('users/logout', 'UsersController@logout');

Route::get('emailtest', 'UsersController@TestEmail');
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e
