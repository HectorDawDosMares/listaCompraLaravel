@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-4">

        {{-- READY: Imagen genérica de los productos --}}
        <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        {{-- READY: Datos del producto --}}
        <h1>Nombre: {{ $producto->nombre }}</h1>
        <h3>Categoría: {{ $producto->categoria }}</h3>

        @if($producto->pendiente)
            <h4>Estado: Producto pendiente de compra</h4>
            <button type="button" class="btn btn-primary">Comprar</button>
        @else
            <h4>Estado: Producto actualmente comprado</h4>
            <button type="button" class="btn btn-danger">Comprado</button>
        @endif
        <button type="button" class="btn btn-warning" onclick=window.location.href="{{ url('/productos/edit/' . $producto->id ) }}">Editar</button>
        <button type="button" class="btn btn-light" onclick="window.location.href='http://listacompra.test'">Volver al listado</button>



    </div>
</div>


@stop
