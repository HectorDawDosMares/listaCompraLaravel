@extends('layouts.app')

@section('content')

    <div class="row">
        @foreach( $arrayCategorias as $categoria )

        <div class="col-xs-6 col-sm-4 col-md-3 text-center">

            <a href="{{ url('/productos/categorias/' . $categoria->categoria ) }}">
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{ $categoria->categoria }}
                </h4>
            </a>

        </div>
        @endforeach

    </div>

@stop
