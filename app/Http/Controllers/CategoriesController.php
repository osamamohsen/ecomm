<?php

namespace App\Http\Controllers;
// use App\Http\Middleware;

// use App\Http\Middleware\Authenticate;
// use App\Http\Middleware\EncryptCookies;
// use App\Http\Middleware\RedirectIfAuthenticated;
// use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\OldMiddleware;

use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
// use Request;
// use App/Http/Kernel.php;
use Validator;
use Input;
use Auth;
use Closure;
// use Illuminate\Contracts\Routing\TerminableMiddleware;
class CategoriesController extends BaseController
{

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
        return view('categories.index')-> with('categories',Category::all());
    }

    public function create(){
    }

    public function destroy(){
        $category = Category::find(Input::get('id'));
        echo $category;
        if($category){
            $category->delete();
            return redirect('/categories')
            ->with('message','Category had been Destroyed');
        }
        return redirect('/categories')
        ->with('message', 'something went wrong , please try again');
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
        $validator = Validator::make(Input::all(),Category::$rules);
        if($validator->passes()){
           $category = new Category;
            $category->name=Input::get('name');
            $category->save();
            return redirect('/categories')->
            with('message' ,'Category Created');
        }
        return redirect('/categories')
        ->with('message', 'something get wrong')
        ->withErrors($validator)
        ->withInput();
        //
    }

  
}
