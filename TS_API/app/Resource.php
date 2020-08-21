<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

	public static function imgPath($param){
		$path = "/img";//config('app.public_path');
		
		if($param == null){
			//return $path."/storage/img/";
			return $path;
		}

		//return $path."/storage/img/".$param;
		return $path."/".$param;
	}

	public static function filesPath($param){
		$path = "/files";//config('app.public_path');

		if($param == null){
			//return $path."/storage/files/";
			return $path;
		}

		//return $path."/storage/files/".$param;
		return $path."/".$param;
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
		$aux = Accesory::Find($accesory->id);

    	if($type_instalation != null){
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

		$aux->loadMissing('calculations');
		foreach ($aux->calculations as $v ) {
			Resource::CalculateTotal($v, $product, $aux);
		}

		if(is_float($aux->count_total)){
        	$aux->count_total = ceil($aux->count_total);
        }

        $accesory->count_total = $aux->count_total;

        if(is_array($array)){
        	$array[] =json_decode(json_encode($accesory));
        }
    }

    public static function CalculateTotal($calculate, $product, $accesory){
    	if($calculate->product_condition_id != null && $product->id != $calculate->product_condition_id){
    		return;
    	}

    	switch ($calculate->type_relation) {
		    case 1:
		            $total_mts_product = $product->count_total * $product->long;
		           //$accesory->count_total = ceil($accesory->count * ($total_mts_product / $accesory->count_product));

					$accesory->count_total = $total_mts_product / $calculate->count_product;

		            if(is_float($accesory->count_total)){
		            	$accesory->count_total = ($calculate->count * floor($accesory->count_total) ) + $calculate->count;
		            }else{
		            	$accesory->count_total = $calculate->count * $accesory->count_total;
		            }
		        	break;
		    case 2:
		            $accesory->count_total = ($product->count_total / $calculate->count_product) * $calculate->count;
		            break;
		    case 3: $accesory->count_total = ($accesory->count_total / $calculate->count_product) * $calculate->count;
        			break;
		    case 4:
		    		$total_mts_product = $product->count_total * $product->long;
		           
					$accesory->count_total = $total_mts_product / $calculate->count_product;

	            	$accesory->count_total = $calculate->count * $accesory->count_total;
		            break;
		    
        }

    }
}
