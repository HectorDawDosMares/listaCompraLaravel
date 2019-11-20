@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        {{-- READY: Imagen genérica de los productos --}}
        <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        {{-- READY: Datos del producto --}}
        <h1>Nombre: {{ $producto[0] }}</h1>
        <h3>Categoría: {{ $producto[1] }}</h3>
        <h4>Estado: Producto actualmente comprado</h4>
        <button type="button" class="btn btn-danger">Pendiente de compra</button>
        <button type="button" class="btn btn-warning">Editar</button>
        <button type="button" class="btn btn-light" onclick="window.location.href='http://listacompra.test'">Volver al listado</button>

    </div>
</div>


@stop
