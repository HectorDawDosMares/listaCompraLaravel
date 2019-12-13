@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-4">
        <a href="{{ action( 'ProductoController@show', ['producto' => $producto] ) }}">
            <img src="{{ asset('storage/' . $producto->imagen) }}" style="height:200px"/>
        </a>
    </div>

    <div class="col-sm-8">

        <h1>Nombre: {{ $producto->nombre }}</h1>
        <h3>Categoría: {{ $producto->categoria }}</h3>

        <form action="{{ action( 'ProductoController@changeComprado' , ['producto' => $producto] ) }}" method="POST">
            {{method_field('PUT')}}
            @csrf

            @if(!$comprado)
            <h4>Estado: Producto pendiente de compra</h4>
            <button type="submit" class="btn btn-danger">Comprar</button>
            @else
            <h4>Estado: Producto actualmente comprado</h4>
            <button type="submit" class="btn btn-primary">Comprado</button>
            @endif

            <a class="btn btn-warning" href="{{ action( 'ProductoController@edit', ['producto' => $producto] ) }}">Editar</a>
            <a class="btn btn-light" href="{{ action( 'ProductoController@index' ) }}">Volver al listado</a>
        </form>

        <br>

        <form action="{{ action('ProductoController@destroy', ['producto' => $producto]) }}" method="POST">
            {{method_field('DELETE')}}
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar producto</button>
        </form>

    </div>
</div>

@stop
