<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalation extends Model
{
    //
	public $timestamps = false;
	
    public function accesories() {
	    return $this->belongsToMany('App\Accesory');
	}
}
