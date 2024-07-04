@extends('cliente.carrito.layout')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ asset('storage/' . $product->imagen) }}" alt="" >
                <div class="caption">
                    <h4>{{ $product->nombre_producto }}</h4>
                    {{-- <p>{{ $product->descripcion }}</p> --}}
                    <p><strong>Price: </strong> {{ $product->precio_unitario }}$</p>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="/detalle/{{ $product->id_producto }}">Ver detalles</a>
                        </div>
                    </div>
                    <p class="btn-holder"><a href="{{ route('carrito.agregar', $product->id_producto) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>

                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

