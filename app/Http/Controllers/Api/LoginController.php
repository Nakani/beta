<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Membros;
use App\Utils;
use App\AppResult;



class LoginController extends Controller
{
	public function loginMembro(Request $request){
		// var_dump($request['email']);
		// print_r($request['password']);
		// die();
		$auth = Auth::guard('web');
		if ($auth->attempt(['email' => strtolower($request['email']), 'password' => $request['password']]))
		{
			$user = $auth->user();
			if($user->ativo !='1')
			{
				return AppResult::error('Seu cadastro está inativo');
					
			}

			$newApiToken = str_random(60);

			$rs = App\Membros::where('id', $auth->user()->id)
					->update(['api_token' => $newApiToken]);
			if(!$rs)
				return  AppResult::error('Erro ao gerar o token de autenticação', 100);


			return AppResult::result([
									'id' => $auth->id(),
									'id_cliente' => $user->id_cliente,
									'api_token' => $newApiToken
									]);
		} else {
			return AppResult::error('Email e/ou senha inválido(s)', 10);
		}

	}
}
