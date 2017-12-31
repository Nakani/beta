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

Route::get('/chatbot',  function () {
    return '{
  "id": "93ca6443-2aa8-404b-94f5-d5e682b3d81d",
  "timestamp": "2017-12-31T06:00:32.871Z",
  "lang": "pt-br",
  "result": {
    "source": "agent",
    "resolvedQuery": "oi",
    "action": "",
    "actionIncomplete": false,
    "parameters": {},
    "contexts": [],
    "metadata": {
      "intentId": "3167b894-dec9-4ec2-b764-c1c6d15e6194",
      "webhookUsed": "true",
      "webhookForSlotFillingUsed": "false",
      "webhookResponseTime": 154,
      "intentName": "Olá"
    },
    "fulfillment": {
      "speech": "Oi Tudo bem?",
      "messages": [
        {
          "type": 0,
          "speech": "Oi Tudo bem?"
        }
      ]
    },
    "score": 1
  },
  "status": {
    "code": 206,
    "errorType": "partial_content",
    "errorDetails": "Webhook call failed. Error: 404 Not Found",
    "webhookTimedOut": false
  },
  "sessionId": "0f6e10f6-9189-43b1-96fc-0ff19ff2910f"
}';
});