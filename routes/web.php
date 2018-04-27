<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/uploadMembros', 'Dash\AdmMembrosController@import');
// login
Route::get('/', 'LoginController@index');
Route::get('/login', 'LoginController@index');
Route::get('/cadastro', function()
{
	return view('cadastro');
});
Route::post('/login', 'LoginController@auth');
Route::post('/cadastro', 'LoginController@cadastro');
Route::get('/logout', 'LoginController@logout');
Route::get('/senha', 'LoginController@getSenha');

// 	Dashboard
Route::group(['middleware' => 'auth:admweb'], function () {
	Route::get('/dashboard', 'Dash\AdmDashboardController@index');
	
	// usuarios CRM
	Route::get('/usuarios', 'Dash\AdmUsuarioController@listar');
	Route::get('/usuario/editar/{id}', 'Dash\AdmUsuarioController@editar');
	Route::get('/usuario/pesquisar', 'Dash\AdmUsuarioController@pesquisar');
	Route::get('/usuario-listar', 'Dash\AdmUsuarioController@paginate');
	Route::get('/usuario/adicionar', 'Dash\AdmUsuarioController@adicionar');
	Route::get('/usuario/delete/{id}', 'Dash\AdmUsuarioController@delete');
	Route::post('/usuario/update/{id}', 'Dash\AdmUsuarioController@update');
	Route::post('/usuario/save', 'Dash\AdmUsuarioController@save');

	// Clientes CRM
	Route::get('/clientes', 'Dash\AdmClienteController@listar');
	Route::get('/cliente/editar/{id}', 'Dash\AdmClienteController@editar');
	Route::get('/cliente/pesquisar', 'Dash\AdmClienteController@pesquisar');
	Route::get('/cliente-listar', 'Dash\AdmClienteController@paginate');
	Route::get('/cliente/adicionar', 'Dash\AdmClienteController@adicionar');
	Route::get('/cliente/delete/{id}', 'Dash\AdmClienteController@delete');
	Route::post('/cliente/update/{id}', 'Dash\AdmClienteController@update');
	Route::post('/cliente/save', 'Dash\AdmClienteController@save');
	
	// Membros CRM
	Route::get('/membros', 'Dash\AdmMembrosController@listar');
	Route::get('/membro/editar/{id}', 'Dash\AdmMembrosController@editar');
	Route::get('/membro/pesquisar', 'Dash\AdmMembrosController@pesquisar');
	Route::get('/membro-listar', 'Dash\AdmMembrosController@paginate');
	Route::get('/membro/adicionar', 'Dash\AdmMembrosController@adicionar');
	Route::get('/membro/delete/{id}', 'Dash\AdmMembrosController@delete');
	Route::post('/membro/update/{id}', 'Dash\AdmMembrosController@update');
	Route::post('/membro/save', 'Dash\AdmMembrosController@save');

	// Campanha CRM
	Route::get('/campanhas', 'Dash\AdmCampanhaController@listar');
	Route::get('/campanha/editar/{id}', 'Dash\AdmCampanhaController@editar');
	Route::get('/campanha/pesquisar', 'Dash\AdmCampanhaController@pesquisar');
	Route::get('/campanha-listar', 'Dash\AdmCampanhaController@paginate');
	Route::get('/campanha/adicionar', 'Dash\AdmCampanhaController@adicionar');
	Route::get('/campanha/delete/{id}', 'Dash\AdmCampanhaController@delete');
	Route::post('/campanha/update/{id}', 'Dash\AdmCampanhaController@update');
	Route::post('/campanha/save', 'Dash\AdmCampanhaController@save');
	
	// Fases CRM
	Route::get('/fases/{id}', 'Dash\AdmFaseController@listar');
	Route::get('/fase/editar/{id}', 'Dash\AdmFaseController@editar');
	Route::get('/fase/pesquisar', 'Dash\AdmFaseController@pesquisar');
	Route::get('/fase-listar', 'Dash\AdmFaseController@paginate');
	Route::get('/fase/adicionar/{id}', 'Dash\AdmFaseController@adicionar');
	Route::get('/fase/delete/{id}/{idfase}', 'Dash\AdmFaseController@delete');
	Route::post('/fase/update/{id}', 'Dash\AdmFaseController@update');
	Route::post('/fase/save', 'Dash\AdmFaseController@save');

	// Modulo Teste
	Route::get('/adicionarTeste/{id}/{idfase}', 'Dash\AdmFaseController@adicionarTeste');

	//Fases historias e teste
	Route::get('/adicionarHistoria/{id}/{idfase}', 'Dash\AdmFaseController@adicionarHistoria');
	Route::post('/salvarHistoria', 'Dash\AdmFaseController@salvarHistoria');
	Route::post('/updateHistoria/{id}', 'Dash\AdmFaseController@updateHistoria');
	Route::get('/deleteHistoria/{campanha_id}/{idfase}/{id}', 'Dash\AdmFaseController@deleteHistoria');
	Route::get('/editarHistoria/', 'Dash\AdmFaseController@editarHistoria');
	Route::get('/historia-respostas', 'Dash\AdmFaseController@getRespostaHistorias');

	// Missão
	Route::get('/missoes/{idfase}', 'Dash\AdmMissaoController@listar');
	Route::get('/missao/adicionar/{idfase}', 'Dash\AdmMissaoController@adicionarMissao');
	Route::get('/missao/editar/{idfase}', 'Dash\AdmMissaoController@editar');
	Route::post('/missao/save', 'Dash\AdmMissaoController@saveMissao');


});

