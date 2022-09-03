<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
	protected $guarded = ['id'];    

	

    public function url_vip_pass()
    {
    	$hash = md5(ENV('PREFIJO_HASH').$this->id);
    	$url = env('PATH_PUBLIC').'vip-pass/'.$this->id.'/'.$hash;
        return $url;
    }

    //protected $table = 'roles_de_usuario';
}
