<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Admins_grupo extends Model
{
  	protected $table = 'admins_grupo';
	
	protected $primaryKey = 'id';

	protected $fillable = [
		'admin_uid',
		'grupo_id',
		'permissao'
    ];
}
