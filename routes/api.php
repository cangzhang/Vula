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

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::group(['middleware' => ['cors'], 'prefix' => ''], function () {
    Route::post('register', '\xzNotes\Auth\Controllers\ApiAuthController@register');     // register
    Route::post('login', '\xzNotes\Auth\Controllers\ApiAuthController@login');           // login
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('userInfo', '\xzNotes\Auth\Controllers\ApiAuthController@getUserDetails');  // get user info
        Route::get('logout', '\xzNotes\Auth\Controllers\ApiAuthController@logout');  // get user info
    });
});
