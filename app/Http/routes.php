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

Route::get('/', function () {
    return view('welcome');
});

// ---- Auth ----
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

// ------------------------------
// ---- Admin Routes Section ----
// ------------------------------
 
// ---- Home ----
Route::get('home', 'Admin\HomeController@index');

// ---- Store ----
Route::group(['prefix' => 'store', 'middleware' => 'auth'], function () {
	Route::get('/settings', 'Admin\Store\StoreController@edit');
	Route::post('/update/{id}', 'Admin\Store\StoreController@update');
});

// ---- Product ----
Route::group(['prefix' => 'products', 'middleware' => 'auth'], function () {
	Route::get('/', 'Admin\Product\ProductController@index');
	Route::get('/list', ['as' => 'products.list', 'uses' => 'Admin\Product\ProductController@productList']);
	Route::post('/{id}/update', 'Api\V1\Admin\Product\ProductController@update');
});

// ---- Api Product ----
Route::group(['prefix' => 'api/products', 'middleware' => 'auth'], function () {
	Route::get('/', 'Api\V1\Admin\Product\ProductController@index');
	Route::post('/create', 'Api\V1\Admin\Product\ProductController@create');
	Route::post('/{productId}/update', 'Api\V1\Admin\Product\ProductController@update');
	Route::delete('/{productId}/destroy', 'Api\V1\Admin\Product\ProductController@destroy');
});
