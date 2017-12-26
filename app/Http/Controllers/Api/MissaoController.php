<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Missao;

class MissaoController extends Controller
{
	public function getMissoesAll($id){
		$data = Missao::Select(
							'missao.id',
							'titulo',
							'descricao',
							'tipo',
							'dados',
							'id_imagem',
							'nome',
							'url'
								)
							->where('id_fase',$id)
							->leftJoin('imagens as i','missao.id_imagem','=','i.id')
							->get()
							->toArray();

		return json_encode($data);
	}

}
