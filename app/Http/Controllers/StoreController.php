<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\libs\Availablity;
use App\Http\Controllers\Controller;
use App\Products;
use App\Category;
use Input;
use Auth;
class StoreController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        parent::__construct();
        // $this->middleware('auth');
        $this->beforeFilter('csrf',array('on' => 'post'));
     
    }

    public function index()
    {
        return view('store.index')
        ->with('products',Products::orderBy('created_at','desc')->paginate(8));
    
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {

        if(is_numeric($id))
            return view('store.view')->with('product',Products::find($id));
        else if($id=="signout") 
            return redirect('/signout');
        else
            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getCategory($cat_id){
        return view('store.category')
        ->with('products',Products::where('category_id','=',$cat_id)
            ->orderBy('created_at','desc')->paginate(6))
        ->with('category',Category::find($cat_id));
    }

    /**
     * Display the specified resource.
     *
     * Search by Title of Product
     * @return Response
     */

    public static function search(){
        $keyword=Input::get('keyword');
        return view('store.search')
        ->with('products',Products::where('title','LIKE','%'.$keyword.'%')->get())
        ->with('keyword',$keyword);
    }

    public static function contact_us(){
        return view('store.contact');
    }
}
