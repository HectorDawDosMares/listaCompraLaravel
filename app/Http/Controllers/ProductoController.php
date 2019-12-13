<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoria = false)
    {
        if(!$categoria) {
            $productos = Producto::all();
            $rtn = view('productos.index', array('arrayProductos'=>$productos));
        } else {
            $productos = Producto::where('categoria', $categoria)->get();
            if (!$productos->isEmpty()) {
                $rtn = view('productos.index', array('arrayProductos'=>$productos));
            } else {
                $rtn = redirect(action('ProductoController@index'));
            }
        }

        return $rtn;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria = $request->categoria;
        if($request->exists('imagen')) {
            $producto->imagen = Storage::disk('public')->putFile('imagens', $request->file('imagen'));
        }
        $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect(action('ProductoController@index'))
            ->with('success','Producto creado correctamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $comprado = $this->existeProductoUsuario($producto);
        return view('productos.show', ['producto' => $producto, 'comprado' => $comprado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', array('producto'=>$producto));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria = $request->categoria;
        if($request->exists('imagen')) {
            $producto->imagen = Storage::disk('public')->putFile('imagens', $request->file('imagen'));
        }
        $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect()->action('ProductoController@show',['producto' => $producto])
            ->with('success','Producto actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto) {
        $producto->delete();
        Storage::disk('public')->delete($producto->imagen);
        return redirect()->action('ProductoController@index')
            ->with('success','Producto eliminado correctamente!');
    }

    public function changeComprado(Producto $producto) {
        $userFila = User::findOrFail(Auth::id());

        if($this->existeProductoUsuario($producto)) {
            $producto->users()->detach($userFila);
        } else {
            $producto->users()->attach($userFila);
        }

        return redirect()->action('ProductoController@show', ['producto' => $producto]);
    }

    public function existeProductoUsuario($producto) {
        $userFila = User::findOrFail(Auth::id());
        return $producto->users->contains($userFila) ? true : false;
    }

    public function getCategorias() {
        $categorias = Producto::select('categoria')->distinct('categoria')->get();
        return view('productos.categorias', ['arrayCategorias'=>$categorias]);
    }

}
