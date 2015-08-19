<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Detect For Store Data
Route::resource('/', 'StoreController');
Route::post('search','StoreController@search');
Route::resource('store','StoreController');
Route::get('store/category/{id}','StoreController@getCategory');


// Admin Controlls
//--------------------------------------------------
Route::resource('categories','CategoriesController');
Route::resource('products','ProductsController');
// _________________________________________________
//  End Admin Controlls

// Cart of User
//--------------------------------------------------
// Route::post('cart','CartsController@index');
Route::resource('cart','CartsController');
//__________________________________________________
//  End Cart OF user


Route::resource('users','UsersController');
Route::post('postsignin','UsersController@postsignin');


Route::get('signout','UsersController@signout');


//contact Us
Route::get('/contact','StoreController@contact_us');


// Route::get('user/{user}', [
//      'middleware' => ['auth', 'roles'],
//      'uses' => 'UserController@index',
//      'roles' => ['administrator', 'manager']
// ]);
// signout

// Route::controllers([

// 		'auth' => 'Auth\AuthController',
// 		'password' => 'Auth\PasswordController',

// 	]);

