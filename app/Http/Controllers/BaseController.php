<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Auth;
use App\Cart;
use App\Category;
use App\Products;
class BaseController extends Controller
{
    public static $userproducts=array(); // Caryy All Products Details for User

    public function __construct(){
        $this->beforeFilter(function (){
            View::share('catnav',Category::all());
            $this->GetProductUser();
        });
    }//end constructor

    // Get Product Details And Product ID
    public function GetProductUser(){
        if(Auth::check()){
            $products = Products::join('cart','products.id','=','cart.product_id')
                  ->where('cart.user_id','=',Auth::user()->id)
                  ->get();
            View::share('userproducts',$products);
            BaseController::$userproducts=$products;
            return $products;
        }
    }

    public function setupLayout(){
        if(!is_null($this->layout)){
            $this->layout=View::make($this->layout);
        }
    }//end function setupLayout

    
}
