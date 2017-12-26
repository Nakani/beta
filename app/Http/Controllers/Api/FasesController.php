<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Fases;
use App\Historias;
use App\Utils;
use App\AppResult;



class FasesController extends Controller
{
	public function getFasesAll($idCampanha	){
		$data = Fases::select('id')
						->where('campanha_id',$idCampanha)
						->get()
						->toArray();
		return json_encode($data);
	}

	public function getFaseId($id){
		$data = Fases::select(
							'id',
							'nome',
							'ajuda',
							'missao'
							)->where('id',$id)->get()->toArray();
		return json_encode($data);

	}
	public function getAjudaFaseId($id){
		$data = Fases::select('ajuda')->where('id',$id)->get()->toArray();
		return json_encode($data);

	}

	public function getHistoriaId($idFase){
		
		$data = Historias::select(
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
						->where('id_fase',$idFase)
						// ->where('historias.id','111')
						->leftJoin('personagens as p','historias.personagem_id','=','p.id')
						->leftJoin('imagens as i','historias.id_imagem','=','i.id')
						->get()
						->toArray();

		$dados = array();
		$opcoes = array();
		$array = array();

		foreach ($data as $value) {

			$dados['historia_id'] = $value['id'];
			$dados['conteudo'] = $value['conteudo'];
			$dados['id_atributo'] = $value['id_atributo'];
			$dados['tipo'] = $value['tipo'];
			$dados['personagem_id'] = $value['personagem_id'];
			$dados['nome_personagem'] = $value['nome_personagem'];
			$dados['url'] = $value['url'];
			$dados['tempo_conversa'] = $value['tempo_conversa'];
			$dados['pausa'] = $value['pausa'];
			if($value['opcoes']!=NULL){
				//var_dump($value['opcoes']);
				$dados['opcoes'] = Utils::getOpcoes($value['opcoes']);
				
			}

			$array[] = $dados;
		}
		return json_encode($array);

	}




	public function getOpcoesId($id){
		$data = Historias::select('opcoes')
				->where('id',$id)
				->leftJoin('personagens as p','historias.personagem_id','=','p.id')
				->get()
				->toArray();
		return json_encode($data);
	}			

}
