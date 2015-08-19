<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Products;
use App\libs\Availablity;
use Auth;
use DB;
use User;
use Input;

class CartsController extends BaseController
{

    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function cartUser(){
        $products = BaseController::GetProductUser();
         return $products;

    }
    public function cartCost($products){
        $prices=0;
        foreach ($products as $product) {
            $prices+=$product->price*$product->quantity;
        }
        return $prices;
    }
    public function index()
    {
        if(Auth::check()){
            $products=$this->cartUser();
            return view('carts.index')
            ->with('products',$products)
            ->with('total',$this->cartCost($products));
        }else
       return redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return "Done";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update($product,$value){
        $mycart=Cart::where('user_id','=',Auth::user()->id)
                -> where('product_id','=',$product)
                -> first();
        $mycart->quantity=$mycart->quantity+$value;
        $mycart->save();
        return redirect('/cart');
    }


    public function store()
    {
        if(Auth::check()){
            $check=Availablity::cartUserExist(Input::get('product_id'));
            if(!$check){
                $cart=new Cart;
                $cart->product_id = Input::get('product_id'); 
                $cart->user_id=Auth::user()->id;
                $cart->save();
                return redirect('/cart');
            }
            else{
                return $this->update(Input::get('product_id'),1);
            }
        }
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        echo "Here";
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        // Carry 2 Event (Delete All , Decrease Qunatitiy)
        $data=Cart::find($id);
        if(Input::get('quantity')==1 || Input::get('deleteAll')){
            $data->delete();
        }else{
            return $this->update($data->product_id, -1);
        }
        return redirect('/cart');
    }
}
