<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use App\Http\Requests;
use Input;
use Closure;
use Validator;
use App\User;
use App\Auth\AuthController;
use App\libs\Availablity;
use Auth;
use Hash;
use View;
class UsersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf',array('on' => 'post'));
    }

    public function index(){
       return view('users.signin');
        // return view('auth.login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create(){
      return view('users.newaccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(){
        $validator=Validator::make(Input::all(),User::$rules);
        if($validator->passes()){
            $user = new User;
            $user->firstname=Input::get('firstname');
            $user->lastname=Input::get('lastname');
            $user->password=Hash::make(Input::get('password'));
            $user->email=Input::get('email');
            $user->telephone=Input::get('telephone');
            $user->save();

            return redirect('/users')
            ->with('message','Thank you for creating an new account.Please Sign In');
        }
        return redirect('/users/create')
        ->with('message','Something went wrong')
        ->withErrors($validator)
        ->withInput();
    }

    public function postsignin(){
        $validator=Validator::make(Input::all(),User::$login);
        if($validator->passes() && 
            Auth::attempt(['email' => Input::get('email'), 
            'password' => Input::get('password')])){
              return redirect('/')
            ->with('message',"Thanks for signing in");
        }
        return redirect('/users')
        ->with('message','Your email/password was incorrect')
        ->withErrors($validator)
        ->withInput();
    }

    public function signout(){
        
        echo "Donsse";
        Auth::logout();
        echo "Done";
        return redirect('/')->with('message','You have been sigout');
    }
}
