@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="{{ asset('storage/' . $producto->imagen) }}" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        {{-- READY: Datos del producto --}}
        <h1>Nombre: {{ $producto->nombre }}</h1>
        <h3>Categoría: {{ $producto->categoria }}</h3>

        <form action="{{ action('ProductoController@changeComprado')}}" method="POST">
            {{method_field('PUT')}}
            @csrf
            <input type="hidden" name="id" value="{{ $producto->id }}">

            @if(!$comprado)
            <h4>Estado: Producto pendiente de compra</h4>
            <button type="submit" class="btn btn-danger">Comprar</button>
            @else
            <h4>Estado: Producto actualmente comprado</h4>
            <button type="submit" class="btn btn-primary">Comprado</button>
            @endif

            <a class="btn btn-warning" href="{{ action('ProductoController@getEdit', ['id' => $producto->id]) }}">Editar</a>
            <a class="btn btn-light" href="{{ action('ProductoController@getIndex') }}">Volver al listado</a>
        </form>

    </div>
</div>


@stop
