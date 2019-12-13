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
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@getHome');

Route::get('productos/categorias', 'ProductoController@getCategorias')->middleware('auth');
Route::get('productos/categorias/{categoria?}', 'ProductoController@index')->middleware('auth');

Route::put('productos/changeComprado/{producto}', 'ProductoController@changeComprado')->middleware('auth');

Route::resource('productos', 'ProductoController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
