<?php
namespace App;

use Illuminate\Support\Facades\Session;
use Image;
use App\Menu;
use App\Acessos;
use App\Grupos;
use App\Usuarios;
use App\Membros;
use App\Campanhas;
use App\Historias;
use App\Personagens;
use App\Fases;
use App\Imagens;
use Auth;
use DB;

class Utils
{
	public static function AcessoMenu($id)
	{

		$data = Acessos::select('menu')
						->where('id_usuario','=',$id)
						->get()
						->first();
		if($data['menu']!=NULL){
			return json_decode($data['menu']);
		}
		else{
			return array();
		}
		die();
	}
	
	public static function GetMenu($id)
	{
		$data = Menu::select('*')
						->whereNull('id_menu')
						->where('id',$id)
						->orderBy('posicao', 'asc')
						->get()
						->first();

		return $data;
	}

	public static function GetSubMenu($id)
	{
		$data = Menu::select('*')
						->where('id_menu','=',$id)
						->orderBy('posicao', 'asc')
						->get()
						->toArray();
		return $data;
	}

	public static function GetGrupos()
	{
		$data = Grupos::select('*')
				->get()->toArray();

	}

	public static function getPermissaoGrupo($id){
		$permissaoGrupo = Usuarios::select('permissao')
						->where('usuarios.id','=',$id)
						->leftJoin('grupos as g', 'g.id', '=', 'usuarios.grupo_id')
						->get()
						->first()->toArray();
		return $permissaoGrupo['permissao'];
	}

	public static function getNomeCampanha($id){

		$dados = Campanhas::select('nome')->where('id',$id)->get()->first()->toArray();
		return $dados['nome'];

	}
	public static function getNomeFase($id){
		$dados = Fases::select('nome')->where('id',$id)->get()->first()->toArray();
		return $dados['nome'];

	}

	public static function getNomeHistoria($id){
		$dados = Historias::select('conteudo')->where('id',$id)->get()->first();
		if($dados!=null){
			return ' '.$dados['conteudo'];
		}else{
			echo 'Sem vinculo!';
		}
	}

	public static function getNomePersonagem($id){
		if($id!=NULL)
		{
			$dados = Personagens::select('nome')->where('id',$id)->get()->first()->toArray();
			return $dados['nome'];
		}else{
			return 'sem Personagem';
		}
	}

	public static function getNomeAtributo($id){
		if($id!=NULL)
		{
			$dados = Atributos::select('nome')->where('id',$id)->get()->first()->toArray();
			return $dados['nome'];
		}else{
			return 'sem Nome';
		}
	}

	public static function getUrlImage($id){
		if($id!=NULL)
		{
			$dados = Imagens::select('url')->where('id',$id)->get()->first()->toArray();
			return $dados['url'];			
		}
	}

	public static function getClienteById($id){
		$dados = Membros::select('*')->where('id',$id)->get()->first()->toArray();
		echo "<pre>";
		print_r($dados);
		die();
	}

	public static function getOpcoes($array){
		$dados = array();
		$arrayOp = array();
			$arrayOpcoes = json_decode($array);
			if($arrayOpcoes!=''){

				foreach ( $arrayOpcoes as $value) {
					if($value!=NULL){
						$dados = Historias::select(
											'historias.id',
											'conteudo',
											'id_atributo',
											'id_fase',
											'opcoes',
											'tipo',
											'p.nome as nome_personagem',
											'personagem_id',
											'i.url',
											'tempo_conversa',
											'pausa'
											)
									->where('historias.id',$value)
									->leftJoin('personagens as p','historias.personagem_id','=','p.id')
									->leftJoin('imagens as i','historias.id_imagem','=','i.id')
									->get()
									->toArray();
						array_push($arrayOp,$dados[0]);
					}
				}
			}

			return $arrayOp;
	}

	public static function GetOpcoesHistoria($id){
			print_r($id);
			die();
		if($id!=NULL)
		{
			$dados = Historias::select('opcoes')->where('id',$id)->get()->first()->toArray();


			return $dados['opcoes'];			
		}
	}

	public static function getLatLong($endereco){
		if($endereco!=null){
			$address = str_replace(' ', '+', $endereco);
			$dados = array();
			$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
			$output= json_decode($geocode);
			$lat = $output->results[0]->geometry->location->lat;
			$long = $output->results[0]->geometry->location->lng;
			$data = array(['latitude'=>$lat,'longitude'=>$long]);
			$dados[]= $data;
			return $data;			
		}
	}

}
