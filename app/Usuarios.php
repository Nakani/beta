<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Usuarios extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'usuarios';

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
        'nivel',
        'ativo', 
        'grupo_id'
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
