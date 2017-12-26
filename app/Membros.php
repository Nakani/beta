<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Membro as Authenticatable;
use DB;

class Membros extends Authenticatable
{
	protected $table = 'membros';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome', 
        'email',
        'password', 
        'telefone', 
        'id_cliente',
        'id_grupo',
        'ativo',
        'status',
        'atributo',
        'cpf',
        'cargo',
        'setor',
        'avatar',
        'agencia',
        'conta',
        'cidade',
        'uf'
    ];
	
	protected $primaryKey = 'id';
	
	protected $casts = [
		//'id' => 'string'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];
}
