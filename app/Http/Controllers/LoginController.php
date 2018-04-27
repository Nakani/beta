<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Usuarios;
use App\Utils;
use App\AppResult;



class LoginController extends Controller
{
	public function index()
	{
		return view('login');
	}

    public function auth(Request $request)
	{
		$auth = Auth::guard('admweb');
		if ($auth->attempt(['email' => strtolower($request['email']), 'password' => $request['password']]))
		{
			//melhor colocar em sessao e tratar
			$newApiToken 	= str_random(60);
			$usuario 		= Usuarios::where('id', $auth->user()->id)->get()->first();
			// $menu 		= Acessos::where('id_usuario', $auth->user()->id)->get()->first();
			$menu			= Utils::AcessoMenu($auth->user()->id);
			$sessao['grupo'] 	= Utils::getPermissaoGrupo($auth->user()->id);
			if($auth->user()->ativo=='1')
			{
				$rs = App\Usuarios::where('id', $auth->user()->id)->update(['api_token' => $newApiToken]);
				if(!$rs){
					Session::flash('message','Erro ao gerar o token de autenticação, recarregue está página (ctrl+f5)');
					return redirect('/login');
				}
				$user = $auth->user()->toArray();

				if($menu==NULL){
					Session::flash('message','Seu usuário não está configurado corretamente, por favor entre em contato com o setor responsável!');
					return redirect('/login');
				}

				return redirect('/dashboard');				
			}
			else{
				Session::flash('message','Seu Usuário está desativado!');
				return redirect('/login');	
			}
		} 
		else{
			Session::flash('message','Email e/ou senha inválido(s)');
			return redirect('/login');
			
		}

	}

	public function logout(){
		Session::flush();
		return redirect('/login');
	}

	public function getSenha()
	{
		print_r(Hash::make('Mud@r123#'));
		die();
		return Hash::make($request['senha']);
	}

	public function cadastro(Request $request){
		$email 		= $request['email'];
		$password 	= $request['password'];

		$firebase = "https://advogaapp.firebaseio.com/users/$id/dados/expToken.json";
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $firebase,
		    CURLOPT_USERAGENT => 'Advoga-app'
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);

	}

}
