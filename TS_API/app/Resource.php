<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

	public static function imgPath($param){

		if($param == null){
			return storage_path()."/app/public/img/";
		}

		return storage_path()."/app/public/img/".$param;
	}

	public static function filesPath($param){

		if($param == null){
			return storage_path()."/app/public/files/";
		}

		return storage_path()."/app/public/files/".$param;
	}


	public static function CalculateMts(&$product,$distance,&$array){
        $product->count_total = ceil($distance/$product->long);
        $product->long_total = $product->count_total * $product->long;
        $product->long_total = number_format($product->long_total,2,".","");

        if(is_array($array)){
	        $array[] = json_decode(json_encode($product));
        }
	}

	public static function CalculateCount($products,$count,&$array){
		foreach ($products as $v) {
			$v->count_total = $v->count * $count;

			if(is_array($array)){
		        $array[] = json_decode(json_encode($v));
	        }
		}
	}

    public static function CalculateAccesoriesForProduct($product,&$array,$type_instalation){
        foreach ($product->accesories as $v) {
           Resource::CalculateAccesory($product,$v,$array,$type_instalation);
        }
    }

    public static function CalculateAccesories($product,$accesories,&$array,$type_instalation){
        foreach ($accesories as $v) {
           Resource::CalculateAccesory($product,$v,$array,$type_instalation);
        }
    }

    public static function CalculateAccesory($product,$accesory,&$array,$type_instalation){
		$validate = true;

    	if($type_instalation != null){
    		$aux = Accesory::Find($accesory->id);
    		$aux->loadMissing('instalations');
    		$validate = false;

			foreach ($aux->instalations as $v) {
				if($v->id == $type_instalation){
					$validate = true;
					break;
				}
			}

    	}

    	if(!$validate){
			return;
		}

		switch ($accesory->type_relation) {
		    case 1:
		            $total_mts_product = $product->count_total * $product->long;
		            $accesory->count_total = ceil($accesory->count * ($total_mts_product / $accesory->count_product));
		        break;
		    case 2:
		    case 3:
		            $accesory->count_total = $product->count_total * $accesory->count;
        	break;
        }
        if(is_array($array)){
        	$array[] =json_decode(json_encode($accesory));
        }
    }
}
