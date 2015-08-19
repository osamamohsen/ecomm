<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;
use App\Category;
use HTML;
use Image;
use File;
use Auth;
use Validator;
use Input;
class ProductsController extends BaseController
{

    //install require intervention/image

    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
        $this->beforeFilter('csrf',array('on' => 'post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Auth::user()->admin ) return redirect('/');
        $categories = array();
        foreach (Category::all() as $category) {
           $categories[$category->id]=$category->name;
        }
        return view('products.index')
        -> with('products',Products::all())
        -> with('categories',$categories);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // ('category_id','title','describtion','price','availablity','image');
        $validator = Validator::make(Input::all(),Products::$rules);
        if($validator->passes()){
            $product = new Products;
            $product->title=Input::get('title');
            $product->describtion=Input::get('describtion');
            $product->price=Input::get('price');
            $product->category_id=Input::get('category_id');

            $image=Input::file('image');
            $filename=time()."-".$image->getClientOriginalName();
            Image::make($image->getRealPath())
            ->resize(468,249)
            ->save('img/products/'.$filename);
            $product->image='/img/products/'.$filename;
            $product->save();
            return redirect('/products')->
            with('message' ,'Product Created');
        }
        return redirect('/products')
        ->with('message', 'something get wrong')
        ->withErrors($validator)
        ->withInput();
        //
    }

    public function destroy(){
        $product = Products::find(Input::get('id'));
        if($product){
            File::delete('public/'.$product->image);
            $product->delete();
            return redirect('/products')
            ->with('message','Product had been Destroyed');
        }
        return redirect('/products')
        ->with('message', 'something went wrong , please try again');
    }

    public function update(){
        $product=Products::find(Input::get('id'));
        if($product){
            $product->availablity=Input::get('availablity');
            $product->save();
            return redirect('/products')
            ->with('message','Product has been updated');
        }
        return redirect('/products')
        ->with('message','something went wrong , please try again ');
    }
}
