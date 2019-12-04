@extends('layouts.app')

@section('content')

    <div class="row">
        @php
        $key = 0;
        @endphp
        @foreach( $arrayProductos as $producto )

        <div class="col-xs-6 col-sm-4 col-md-3 text-center">

            <a href="{{ url('/productos/show/' . $producto->id++ ) }}">
                <img src="{{ asset('storage/' . $producto->imagen) }}" style="height:200px"/>
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$producto->nombre}}
                </h4>
            </a>

        </div>
        @endforeach

    </div>

@stop
