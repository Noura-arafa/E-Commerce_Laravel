<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::middleware('api')->post('/categories', 'CategoryController@store');
/*Route::group(['middleware' => ['auth:api']], function () {
    Route::post('login', 'Auth\LoginController@login');
});*/
//Auth::routes();



// Category
//list
Route::get('/categories', 'CategoryController@index');
// add new
Route::post('/categories', 'CategoryController@store');
// view
Route::get('/categories/{id}', 'CategoryController@show');
//edit
Route::put('/categories/{id}/update', 'CategoryController@update');
// delete
Route::delete('/categories/{id}/delete', 'CategoryController@destroy');


// Product
//list
Route::get('/products', 'ProductController@index');
// add new
Route::post('/products', 'ProductController@store');
// view
Route::get('/products/{id}', 'ProductController@show');
// edit
Route::put('/products/{id}/update', 'ProductController@update');
//delete
Route::delete('/products/{id}/delete', 'ProductController@destroy');


// Client

//list
//Route::get('/clients', 'ClientController@index');
// add new
Route::post('/register', 'ClientController@register');
Route::post('/login', 'ClientController@login');
// view
Route::get('/clients/{id}', 'ClientController@show');
// edit
Route::put('/clients/{id}/update', 'ClientController@update');
//delete
Route::delete('/clients/{id}/delete', 'ClientController@destroy');


// Order
// list
Route::get('/orders', 'OrderController@index');
Route::post('/orders', 'OrderController@store');
Route::get('/orders/{id}', 'OrderController@show');
Route::put('/orders/{id}/update', 'OrderController@update');
Route::delete('/orders/{id}/delete', 'OrderController@destroy');
