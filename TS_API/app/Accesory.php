<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesory extends Model
{
    //

	public $timestamps = false;

    public function products() {
	    return $this->belongsToMany('App\Product');
	}
	
    public function instalations() {
	    return $this->belongsToMany('App\Instalation');
	}
}
