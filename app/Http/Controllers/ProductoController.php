<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller {
    public function __construct() {
    }
    public function getIndex() {
        $productos = Producto::all();
        return view('productos.index', array('arrayProductos'=>$productos));
    }
    public function getShow($id) {
        $producto = Producto::findOrFail($id);
        return view('productos.show', array('producto'=>$producto));
    }
    public function getCreate() {
        return view('productos.create');
    }
    public function getEdit($id) {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', array('producto'=>$producto));
    }
    public function postCreate(Request $request) {
        $producto = new Producto;
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->categoria = $request->categoria;
            $producto->imagen = $request->imagen;
            $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect(action('ProductoController@getIndex'));
    }
    public function putEdit(Request $request) {
        $id = $request->id;
        $producto = Producto::findOrFail($id);
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->categoria = $request->categoria;
            $producto->imagen = $request->imagen;
            $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect()->action('ProductoController@getShow',[$id]);
    }
}
