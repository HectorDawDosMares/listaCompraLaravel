<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct() {

    }

    public function getIndex(){
        return view('home');
    }

    public function getShow($id){
        return view('productos.show', array('id'=>$id));
    }

    public function getCreate(){
        return view('productos.create');
    }

    public function getEdit($id){
        return view('productos.edit', array('id'=>$id));
    }
}
