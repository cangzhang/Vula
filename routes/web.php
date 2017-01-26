<?php

Route::get('/', 'HomeController@mainPage');

//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('login', '\Vula\Controllers\LoginController@loginPage')->name('loginPage');
Route::post('login', '\Vula\Controllers\ApiLoginController@userLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', '\Vula\Controllers\RegisterController@regView')->name('register');
Route::post('register', '\Vula\Controllers\ApiRegisterController@signUp');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');