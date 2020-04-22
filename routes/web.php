<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Product;
$products = Product::all();

Route::get('/', function () {
    return view('welcome');
});

Route::view('LaravelShop', 'shop.index', ['products'=>$products]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['middleware'=> 'guest'], function(){
	Route::get('signup', 
	[
		'uses'=>'UserController@getSignup',
		'as'=>'users.signup'
	]);
	Route::post('signup',
	[
		'uses'=>'UserController@postSignup',
		'as'=>'users.signup'
	]);

	Route::get('login',
	[	'uses'=>'UserController@getLogin',
		'as'=>'users.login'
	]);
	Route::post('login',[ 'uses'=>'UserController@postLogin', 'as'=>'users.login']);
});

Route::group(['middleware'=>'auth'], function(){
	Route::get('checkAuth', 'UserController@checkAuth');

	Route::get('logout', 'UserController@logout');

	Route::get('user/profile', 'UserController@getProfile');

});


//Shopping cart
Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' =>	'product.addToCart'
]);

Route::get('shopping-cart',[
	'uses' => 'ProductController@getShoppingCart',
	'as' => 'product.shoppingCart'
]);


//test for cart
Route::get('test', 'testController@test');

//test for luxury javascript
Route::get('testJavascript', 'testController@testJs');

// checkout after shopping
Route::get('checkout',[
	'uses'=>'ProductController@checkout',
	'as'=>'checkout'
]);

Route::post('checkout', [
	'uses'=>'ProductController@postCheckout',
	'as'=>'checkout'
]);
