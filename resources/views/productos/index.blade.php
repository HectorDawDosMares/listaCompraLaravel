@extends('layouts.app')

@section('content')
@include('partials.flash-message')
    <div class="row">

        @foreach( $arrayProductos as $producto )
        <div class="col-xs-6 col-sm-4 col-md-3 text-center">
            <a href="{{ action('ProductoController@show', ['producto' => $producto] ) }}">
                <img src="{{ asset('storage/' . $producto->imagen) }}" style="height:200px"/>
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$producto->nombre}}
                </h4>
            </a>
        </div>
        @endforeach

    </div>

@stop
