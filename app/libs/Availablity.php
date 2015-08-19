<?php

namespace App\libs;
use App\Http\Controllers\BaseController;

class Availablity extends BaseController{
	public static function display($avaiblity){
		if($avaiblity==0) return "Out Of Stock";
		else return "In Stock";
	}
	public static function displayClass($avaiblity){
		if($avaiblity==0) return "outofstock";
		else return "instock";
	}

	public static function cartUserExist($productID){
		foreach (BaseController::$userproducts as $product)
			if($product->product_id == $productID)
				return true;
		return false;
	}

	public static function ProductAdded($productID){
		if(Availablity::cartUserExist($productID))
			return "btn-sm btn-success";
		return "cart-btn";
	}

}

?>