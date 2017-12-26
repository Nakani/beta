<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'auth:adm'], function () {
});
Route::post('/login', 'AdminController@login');
