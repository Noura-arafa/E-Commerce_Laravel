<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Order
// list
Route::get('/orders', 'OrderController@index')->name('orders');
//
Route::get('/orders/create', 'OrderController@create');
Route::post('/orders', 'OrderController@store');
Route::get('/orders/{id}', 'OrderController@show');
Route::get('/orders/{id}/edit', 'OrderController@edit');
Route::put('/orders/{id}/update', 'OrderController@update');
Route::delete('/orders/{id}/delete', 'OrderController@destroy');


// Product
//list
Route::get('/products', 'ProductController@index');
//create page
Route::get('/products/create', 'ProductController@create');
// add new
Route::post('/products', 'ProductController@store');
// view
Route::get('/products/{id}', 'ProductController@show');
// edit page
Route::get('/products/{id}/edit', 'ProductController@edit');
// edit
Route::put('/products/{id}/update', 'ProductController@update');
//delete
Route::delete('/products/{id}/delete', 'ProductController@destroy');


// Category
//list
Route::get('/categories', 'CategoryController@index');
//create page
Route::get('/categories/create', 'CategoryController@create');
// add new
Route::post('/categories', 'CategoryController@store');
// view
Route::get('/categories/{id}', 'CategoryController@show');
// Edit page
Route::get('/categories/{id}/edit', 'CategoryController@edit');
//edit
Route::put('/categories/{id}/update', 'CategoryController@update');
// delete
Route::delete('/categories/{id}/delete', 'CategoryController@destroy');
