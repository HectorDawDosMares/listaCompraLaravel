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

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return view('auth.logout');
});

Route::get('productos', 'ProductoController@getIndex');

Route::get('productos/show/{id}', 'ProductoController@getShow')->where('id', '[0-9]+');

Route::get('productos/create', 'ProductoController@getCreate');

Route::get('productos/edit/{id}', 'ProductoController@getEdit')->where('id', '[0-9]+');
