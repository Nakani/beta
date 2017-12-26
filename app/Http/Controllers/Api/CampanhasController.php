<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Campanhas;

class CampanhasController extends Controller
{
	public function GetCampanhas($idCliente){
		$data = Campanhas::Select(
								'id',
								'nome',
								'descricao',
								'ativo'
								)
							->where('id_cliente',$idCliente)
							->get()
							->toArray();
		return json_encode($data);
	}


}
