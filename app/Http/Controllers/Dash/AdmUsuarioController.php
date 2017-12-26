<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Usuarios;
use App\Grupos;
use App\Acessos;
use App\Menu;
use App\Utils;
use DB;
use Auth;
use App;

class AdmUsuarioController extends Controller
{
	public function __construct(){

	}

	public function listar()
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao<='2'){			
			$data['data'] = Usuarios::select(
								'usuarios.id',
								'usuarios.nome',
								'usuarios.email',
								'usuarios.telefone',
								'usuarios.nivel',
								'usuarios.ativo',
								'g.nome as nome_grupo',
								'usuarios.updated_at'
								)
								->leftjoin('grupos as g', 'usuarios.grupo_id', '=', 'g.id')
								->paginate('10');
			return view('usuario.lista',$data);
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}
	}

	public function paginate()
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao<='2'){
			$data['data'] = Usuarios::select(
								'usuarios.id',
								'usuarios.nome',
								'usuarios.email',
								'usuarios.telefone',
								'usuarios.nivel',
								'usuarios.ativo',
								'g.nome as nome_grupo'
							)
							->leftjoin('grupos as g', 'usuarios.grupo_id', '=', 'g.id')
							->paginate('10');
			return view('usuario.resultado',$data);			
		}
		else{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}

	}

	public function adicionar()
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao=='1'){

		$data['grupos'] = Grupos::select('*')
						->get()
						->toArray();

		$data['menus'] = Menu::select('*')
						->whereNull('id_menu')
						->orderBy('posicao', 'asc')
						->get()
						->toArray();

		return view('usuario.adicionar',$data);

		}
		else{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}
	}

	public function save(Request $request)
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao=='1')
		{
			$usuario = new Usuarios();
			$usuario->fill($request->all());
			$usuario->password = Hash::make($request['password']);
			$respUser = $usuario->save();
			$acesso = new Acessos();
			$acesso->id_usuario = $usuario->id;
			$acesso->id_grupo = $request['grupo_id'];
			$acesso->menu = json_encode($request['menu']);
			$respAcesso = $acesso->save();

			if($respUser=='1' and $respAcesso=='1')
			{
				Session::flash('message','Criado com sucesso!');
				return redirect(url('/usuarios'));	
			}
			else
			{
				Session::flash('message','erro ao adicionar usuário!');
				return redirect(url('/usuarios'));
			}
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}
	}	

	public function editar($id)
	{	
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao<='2')
		{
			$data['usuario']  = Usuarios::select(
									'usuarios.id',
									'usuarios.nome',
									'usuarios.email',
									'usuarios.password',
									'usuarios.telefone',
									'usuarios.nivel',
									'usuarios.ativo',
									'g.id as grupo_id',
									'g.nome as nome_grupo'
								)	
									->where('usuarios.id',$id)
									->leftjoin('grupos as g', 'usuarios.grupo_id', '=', 'g.id')
									->get()
									->first();

			$data['grupos'] = Grupos::select('*')
									->get()
									->toArray();
			$data['menus'] = Menu::select('*')
									->whereNull('id_menu')
									->orderBy('posicao', 'asc')
									->get()
									->toArray();

			$data['acessos'] = Acessos::select('menu')
									->where('id_usuario',$id)
									->get();

			return view('usuario.editar',$data);
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}
	}

	public function update(Request $request)
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao<='2')
		{
			$user = new Usuarios();
			if($request['newPassword']!=''){
				$user->password = Hash::make($request['newPassword']);				
			}
			$user->fill($request->all());
			$respUser = $user->where('id',$request['id'])->update($user->toArray());
			$acesso = new Acessos();
			$acesso->menu = json_encode($request['menu']);
			$respAcesso = $acesso->where('id_usuario',$request['id'])->update($acesso->toArray());

			if($respUser=='1' and $respAcesso=='1'){
				Session::flash('message','Atualizado com sucesso!');
				return redirect(url('/usuarios'));	
			}
			else
			{
				Session::flash('message','erro ao adicionar usuário!');
				return redirect(url('/usuarios'));
			}
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}		
	}

	public function delete($id)
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao=='1')
		{
			$respUser 	= Usuarios::where('id',$id)->delete();
			$respAcesso = Acessos::where('id_usuario',$id)->delete();
			if($respUser=='1' and $respAcesso=='1'){
				Session::flash('message','Apagado com sucesso!');
				return redirect(url('/usuarios'));	
			}
			else
			{
				Session::flash('message','erro ao apagar usuário!');
				return redirect(url('/usuarios'));
			}
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}		
	}
}
