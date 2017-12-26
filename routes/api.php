<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'adm', 'middleware' => 'auth:adm'], function () {


});

Route::group(['prefix' => 'adm'], function () {
	Route::post('/login', 'AdmController@login');
});


Route::group(['middleware' => 'auth.api'], function () {

	 // Campanhas
	 Route::get('/campanhas/{idCliente}', 'Api\CampanhasController@GetCampanhas');

	// fases 
	 Route::get('/fases/{id}', 'Api\FasesController@getFasesAll');

	 Route::get('/fase/{id}', 'Api\FasesController@getFaseId');	 
	 // Historias
	 Route::get('/fase/historia/{idFase}', 'Api\FasesController@getHistoriaId');
	 Route::get('/fase/historia-opcoes/{id}', 'Api\FasesController@getOpcoesId');	 
	 Route::get('/fase/ajuda/{id}', 'Api\FasesController@getAjudaFaseId');

	 // Perfil Membro
	 Route::get('/perfil/{id}', 'Api\PerfilController@getPerfil');

	 // Missao
	 Route::get('/fase/missoes/{idFase}', 'Api\MissaoController@getMissoesAll');



});
// end middleware

Route::get('/login', 'Api\LoginController@loginMembro')->middleware('throttle:20,1');

