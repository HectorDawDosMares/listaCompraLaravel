<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Producto;

class ProductoController extends Controller {
    public function __construct() {
    }
    public function getIndex($categoria = false)
    {

        if(!$categoria) {
            $productos = Producto::all();
            $rtn = view('productos.index', array('arrayProductos'=>$productos));
        } else {
            $productos = Producto::where('categoria', $categoria)->get();
            if (!$productos->isEmpty()) {
                $rtn = view('productos.index', array('arrayProductos'=>$productos));
            } else {
                $rtn = redirect(action('ProductoController@getIndex'));
            }
        }

        return $rtn;
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
            if($request->exists('imagen')) {
                $producto->imagen = Storage::disk('public')->putFile('imagens', $request->file('imagen'));
            }
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
            if($request->exists('imagen')) {
                $producto->imagen = Storage::disk('public')->putFile('imagens', $request->file('imagen'));
            }
            $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect()->action('ProductoController@getShow',[$id]);
    }
    public function changePendiente(Request $request) {
        $producto = Producto::findOrFail($request->id);
        $producto->pendiente = !$producto->pendiente;
        $producto->save();

        return redirect()->action('ProductoController@getShow', ['id' => $request->id]);
    }
    public function getCategorias() {
        $categorias = Producto::select('categoria')->distinct('categoria')->get();
        return view('productos.categorias', array('arrayCategorias'=>$categorias));
    }

}
