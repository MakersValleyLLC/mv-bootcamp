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


/*AUTH:API OLD
Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->users();
});
*/

/*Route to User_Database_Migration Controlle*/
Route::get('/users', 'UsersController')->middleware('auth:api');