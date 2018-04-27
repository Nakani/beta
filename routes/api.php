<?php

use Illuminate\Http\Request;


Route::group(['middleware' => 'auth.api'], function () {

	 // Perfil Membro
	 Route::get('/perfil/{id}', 'Api\PerfilController@getPerfil');



});
// end middleware

Route::get('/login', 'Api\LoginController@loginMembro')->middleware('throttle:20,1');

