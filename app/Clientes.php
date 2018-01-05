<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use Notifiable;
	
	protected $table = 'clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome', 
        'endereco', 
        'bairro', 
        'cidade',
        'id_grupo',
        'ativo',
        'email',
        'password',
        'responsavel'

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
