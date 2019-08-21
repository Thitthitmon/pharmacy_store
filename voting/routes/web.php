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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/voting/search', 'HomeController@search')->name('voting.search');
Route::post('/detail/search', 'HomeController@detail_search')->name('detail.search');



Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('smsin','HomeController@smsin')->name('smsin');

Route::get('detail','HomeController@detail')->name('detail');
Route::post('export','HomeController@export')->name('export');


