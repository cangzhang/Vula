<?php

Route::post('/login', '\Vula\Controllers\ApiLoginController@ApiLogin')->name('api.login');
Route::post('/register', '\Vula\Controllers\ApiRegisterController@ApiRegister')->name('api.register');
