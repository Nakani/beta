<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Membros;
use App\Atributos;
use App\Atributos_membro;
use App\InsigniaMembros;
use App\AtributosAvatar;
use App\HistoriaMembro;
use App\PontuacaoMembro;
use App\Fases;
use App\Clientes;
use App\Grupos;
use App\Utils;
use DB;
use Auth;
use App;

class AdmMembrosController extends Controller
{
	public function __construct(){

	}

	public function listar()
	{
		$permissao = Utils::getPermissaoGrupo(Auth::id());//permissao de acesso('1' acesso super admin)

		if($permissao<='2'){			
			$data['data'] = Membros::select(
								'membros.id',
								'membros.nome',
								'membros.email',
								'membros.telefone',
								'c.nome as nome_cliente',
								'membros.updated_at'
								)
								->leftjoin('clientes as c', 'membros.id_cliente', '=', 'c.id')
								->orderBy('id','desc')
								->paginate('50');
			return view('membros.lista',$data);
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
			$data['data'] = Membros::select(
								'membros.id',
								'membros.nome',
								'membros.email',
								'membros.telefone',
								'c.nome as nome_cliente',
								'membros.updated_at'
								)
								->leftjoin('clientes as c', 'membros.id_cliente', '=', 'c.id')
								->paginate('10');
			return view('membros.resultado',$data)->render();			
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
						
		$data['atributos'] = AtributosAvatar::select('*')
				->get()
				->toArray();						
		$data['clientes'] = Clientes::select('*')
				->get()
				->toArray();
						
		return view('membros.adicionar',$data);	

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
			$membro = new Membros();
			$membro->fill($request->all());
			$membro->password = Hash::make($request['password']);
			$resp = $membro->save();
			
			// foreach ($request['atributos'] as $atributo)
			// {
			// 	$membro_atributo = new Atributos_membro();
			// 	$membro_atributo->id_membro 	= $membro->id;
			// 	$membro_atributo->id_atributo 	= $atributo;
			// 	$membro_atributo->save();
				
			// }
			
			if($resp=='1')
			{
				Session::flash('message','Criado com sucesso!');
				return redirect(url('/membros'));	
			}
			else
			{
				Session::flash('message','erro ao adicionar usuário!');
				return redirect(url('/membros'));
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
			$data['membro']  = Membros::select(
									'membros.id',
									'membros.nome',
									'membros.email',
									'membros.ativo',
									'membros.telefone',
									'c.id as cliente_id',
									'c.nome as nome_cliente',
									'membros.sexo',
									'membros.avatar',
									'cpf',
									'cargo',
									'setor',
									'membros.atributo',
									'membros.agencia',
									'membros.conta',
									'membros.cidade',
									'membros.uf'
								)	
									->where('membros.id',$id)
									->leftjoin('clientes as c', 'membros.id_cliente', '=', 'c.id')
									->get()
									->first();

			$data['grupos'] = Grupos::select('*')
									->get()
									->toArray();

			$data['atributos'] = Atributos_membro::select(
									'id_membro',
									'id_atributo',
									'a.nome as nome',
									'pontuacao'
									)
									->leftjoin('atributos as a', 'atributos_membro.id_atributo', '=', 'a.id')
									->where('id_membro',$id)
									->get()
									->toArray();

			$data['insignias'] = InsigniaMembros::select('*'
									)
									->leftjoin('insignias as i', 'insignia_id', '=', 'i.id')
									->where('membro_id',$id)
									->get()
									->toArray();
			$data['fases'] = Fases::select(
											'id',
											'nome'
										)
									->get()->toArray();

			$data['pontuacao'] = PontuacaoMembro::where('membro_id',$id)->get()->first();
		
			return view('membros.perfil_membro',$data);
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
			$membro 	= new Membros();
			$membro->fill($request->all());
			if($request['new_password']!=''){
				$membro->password = Hash::make($request['new_password']);				
			}
			$resp = $membro->where('id',$request['id'])->update($membro->toArray());
			// $acesso = new Acessos();
			// $acesso->menu = json_encode($request['menu']);
			// $respAcesso = $acesso->where('id_usuario',$request['id'])->update($acesso->toArray());

			if($resp=='1')
			{
				Session::flash('message','Atualizado com sucesso!');
				return redirect(url('/membro/editar/'.$request['id']));	
			}
			else
			{
				Session::flash('message','erro ao adicionar usuário!');
				return redirect(url('/membro/editar/'.$request['id']));
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
			$resp 	= Membros::where('id',$id)->delete();
			if($resp=='1'){
				Session::flash('message','Apagado com sucesso!');
				return redirect(url('/membros'));	
			}
			else
			{
				Session::flash('message','erro ao apagar usuário!');
				return redirect(url('/membros'));
			}
		}
		else
		{
			Session::flash('message','Você não tem acesso! logue-se novamente!');
			return redirect('/dashboard');
		}		
	}

	public function infoMembro(Request $request){
		$data['infos'] = Fases::select(
										'fases.id',
										'fases.nome',
										'hm.acoes',
										'hm.status',
										'hm.created_at',
										'hm.updated_at'
										)
										->where('fases.id',$request['idFase'])
										->leftjoin('historia_membro as hm', 'hm.fase_id', '=', 'fases.id')
										->get()->toArray();


		$data['verificaStatusGeral'] = Utils::verificaStatusGeral($request['idFase'],$request['idMembro']);

		return view('membros.informacoes',$data);

	}

	public function import(Request $request){

        $file = $request->file('arquivo');
        if (empty($file)) {
		Session::flash('message','nenhum arquivo foi enviado ao servidor, tente novamente');
		return redirect(url('/membros'));	
        }
        $file->move('./uploads/membros/',$file->getClientOriginalName());    

	    $row = 1;
		if (($handle = fopen("uploads/membros/".$file->getClientOriginalName(), "r")) !== FALSE)
		{
			echo "<pre>";
		    //Passagem pelas linhas
		    $novo = '';
		    $update = '';
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
		    {

		    	// print_r($data);
		    	// die();


				// $membro 	= new Membros();
		  //   	$membro->nome 		= $data[0];
		  //   	$membro->email 		= $data[1];
		  //   	$membro->conta 		= $data[2];
		  //   	$membro->telefone 	= $data[3];
		  //   	$membro->sexo 		= '1';
		  //   	$membro->cpf 		= $data[5];
		  //   	$membro->cidade		= $data[6];
		  //   	$membro->uf			= $data[7];
		  //   	$membro->setor 	 	= $data[8];
		  //   	$membro->agencia 	= $data[9];
		  //   	$membro->cargo 		= $data[10];
		  //   	$membro->password 	= Hash::make($data[2]);
		  //   	$membro->id_cliente = $data[11];

		echo
		"INSERT INTO membros(nome, email, cpf, conta, telefone,uf,cidade,setor,agencia,cargo,password,id_cliente)
		VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','123123','$data[11]');";
		echo "<br>";





		    	// $search  = $membro->where('email',$data[1])->get()->first();
		    	// if($search['id']==NULL){
			    // 	$resp = $membro->save();
			    // 	if($resp=='1'){
			    // 		$novo++;		    		
			    // 	}
		    	// }else{
		    	// 	$update = $membro->where('id',$search['id'])->update($membro->toArray());
		    	// 	if($update=='1'){
			    // 		$update++;
			    		

			    // 	}
		    	// }
	    }
		fclose($handle);
		 die();
		// Session::flash('message','Adicionado '.$novo.'com sucesso! e '.$update.' atualizados ');
		// return redirect(url('/membros'));	

		}
	}

}


