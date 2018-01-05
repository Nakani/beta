<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'adm', 'middleware' => 'auth:adm'], function () {


});

Route::group(['prefix' => 'adm'], function () {
	Route::post('/login', 'AdmController@login');
});


Route::group(['middleware' => 'auth.api'], function () {

	 // Perfil Membro
	 Route::get('/perfil/{id}', 'Api\PerfilController@getPerfil');

	 // Missao
	 Route::get('/fase/missoes/{idFase}', 'Api\MissaoController@getMissoesAll');



});
// end middleware

Route::get('/login', 'Api\LoginController@loginMembro')->middleware('throttle:20,1');

