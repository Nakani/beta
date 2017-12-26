<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Membros;

class PerfilController extends Controller
{
	public function getPerfil($id){
		$data = Membros::Select(
								'nome',
								'email',
								'telefone',
								'ativo',
								'avatar'
								)
							->where('id',$id)
							->get()
							->toArray();
		return json_encode($data);
	}

}
