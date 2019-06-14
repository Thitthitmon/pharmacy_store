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

Route::get('/', 'HomeController@index')->name('/');

Route::resource('frontend','HomeController');
Route::get('add','Cart\CartController@addToCart')->name('home.add');


Auth::routes();

Route::get('show', 'HomeController@show')->name('home.show');


Route::resource('categories', 'CategoryController')->middleware('admin');
Route::resource('products', 'ProductController')->middleware('admin');
Route::post('products/search','ProductController@search')->name('products.search');


Route::resource('types', 'TypeController')->middleware('admin');


Route::any('cart', 'Cart\CartController@addTocart')->name('cart.index');
Route::any('category/cart', 'Cart\CartController@addTocart')->name('cart.index');

Route::any('cartToOrder', 'Cart\CartController@cartToOrder')->name('cart.order');

Route::get('orders', 'Cart\CartController@order')->name('orders.index')->middleware('admin');

Route::post('orders/complete', 'Cart\CartController@complete')->name('orders.complete')->middleware('admin');

Route::post('orders/delete', 'Cart\CartController@delete')->name('orders.delete')->middleware('admin');


Route::get('customers','Auth\RegisterController@index')->name('customers.index');


Route::resource('users','Auth\RegisterController');
Route::resource('home','HomeController');
Route::any('category/{id}','HomeController@category')->name('home.category');

Route::post('search', "HomeController@search")->name('search');

Route::post('user/edit','HomeController@useredit')->name('/edit');
Route::post('user/update','HomeController@userupdate')->name('update');

