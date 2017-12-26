<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acessos extends Model
{
  	protected $table = 'acessos';
	
	protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_usuario',
        'id_grupo',
        'menu'
    ];


}
