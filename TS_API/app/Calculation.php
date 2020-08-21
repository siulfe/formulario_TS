<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    //
	public $timestamps = false;



    public function accesory() {
	    return $this->hasOne('App\Accesory');
	}
	
}
