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

Route::get('/', function () {
    return "Pantalla principal";
});

Route::get('/login', function () {
    return "Login usuario";
});

Route::get('/logout', function () {
    return "Logout usuario";
});

Route::get('/productos', function () {
    return "Listado productos";
});

Route::get('/productos/show/{id}', function ($id) {
    return "Vista detalle producto " . $id;
})->where('id', '[0-9]+');

Route::get('/productos/create', function () {
    return "Añadir producto";
});

Route::get('/productos/edit/{id}', function ($id) {
    return "Modificar producto " . $id;
})->where('id', '[0-9]+');
