<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Usuarios;
use App\Clientes;
use App\Membros;
use App\Grupos;
use App\Acessos;
use App\Menu;
use App\Utils;
use DB;
use Auth;
use App;

class AdmClienteController extends Controller
{
	public function __construct(){

	}

	public function listar()
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao<='2'){			
			$data['data'] = Clientes::select(
								'clientes.id',
								'clientes.nome',
								'clientes.responsavel',
								'clientes.email',
								'clientes.endereco',
								'clientes.bairro',
								'clientes.cidade',
								'clientes.id_grupo',
								'clientes.ativo',
								'g.nome as nome_grupo',
								'clientes.updated_at'
								)
								->leftjoin('grupos as g', 'clientes.id_grupo', '=', 'g.id')
								->paginate('10');
			return view('cliente.lista',$data);
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
			$data['data'] = Clientes::select(
								'clientes.id',
								'clientes.nome',
								'clientes.email',
								'clientes.telefone',
								'clientes.nivel',
								'clientes.ativo',
								'g.nome as nome_grupo'
							)
							->leftjoin('grupos as g', 'clientes.id_grupo', '=', 'g.id')
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

		return view('cliente.adicionar',$data);	

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
			$cliente = new Clientes();
			$cliente->fill($request->all());
			$cliente->password = Hash::make($request['password']);
			$respUser = $cliente->save();
			//$acesso = new Acessos();
			//$acesso->id_cliente = $cliente->id;
			//$acesso->id_grupo = $request['grupo_id'];
			//$acesso->menu = json_encode($request['menu']);
			//$respAcesso = $acesso->save();

			if($respUser=='1')
			{
				Session::flash('message','Criado com sucesso!');
				return redirect(url('/clientes'));	
			}
			else
			{
				Session::flash('message','erro ao adicionar usuário!');
				return redirect(url('/clientes'));
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
			$data['cliente']  = Clientes::select(
									'clientes.id',
									'clientes.nome',
									'clientes.responsavel',
									'clientes.email',
									'clientes.endereco',
									'clientes.bairro',
									'clientes.cidade',
									'clientes.ativo',
									'g.id as grupo_id',
									'g.nome as nome_grupo'
								)	
									->where('clientes.id',$id)
									->leftjoin('grupos as g', 'clientes.id_grupo', '=', 'g.id')
									->get()
									->first();

			$data['grupos'] = Grupos::select('*')
									->get()
									->toArray();

			// $data['menus'] = Menu::select('*')
			// 						->whereNull('id_menu')
			// 						->orderBy('posicao', 'asc')
			// 						->get()
			// 						->toArray();

			// $data['acessos'] = Acessos::select('menu')
			// 						->where('id_usuario',$id)
			// 						->get();

			return view('cliente.editar',$data);
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
			$cliente 	= new Clientes();
			$cliente->fill($request->all());
			$cliente->password = Hash::make($request['password']);
			$respCliente = $cliente->where('id',$request['id'])->update($cliente->toArray());
			// $acesso = new Acessos();
			// $acesso->menu = json_encode($request['menu']);
			// $respAcesso = $acesso->where('id_usuario',$request['id'])->update($acesso->toArray());

			if($respCliente=='1')
			{
				Session::flash('message','Atualizado com sucesso!');
				return redirect(url('/clientes'));	
			}
			else
			{
				Session::flash('message','erro ao adicionar usuário!');
				return redirect(url('/clientes'));
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
			$respCliente 	= Clientes::where('id',$id)->delete();
			$respMembro 	= Membros::where('id_cliente',$id)->delete();
			if($respUser=='1'){
				Session::flash('message','Apagado com sucesso!');
				return redirect(url('/clientes'));	
			}
			else
			{
				Session::flash('message','erro ao apagar usuário!');
				return redirect(url('/clientes'));
			}
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}		
	}
}
