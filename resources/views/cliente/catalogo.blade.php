@extends('cliente.plantilla.app')

@section('Titulo', 'SYPRA')

@section('contenido')

<header class="bg-dark py-1">
    <div class="container px-4 px-lg-3 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Catálogo</h1>
            <p class="lead fw-normal text-white-50 mb-0"></p>
        </div>
    </div>
</header>

<div class="col-md-5" id="div_botones">
    <form action="/catalogo/categoria" method="POST">
        @csrf
        <div class="mb-1 d-flex justify-content-between">
            <select class="form-select" id="filtroproducts" name="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Realizar consulta" name="enviar">
            <input type="button" value="Ver todos los productos" name="enviar" onclick="window.location.href = '/catalogo';">
        </div>
    </form>
</div>

<section class="py-5">
    <div class="container px-2 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($productos as $product)
                <div class="col mb-5">
                    <div class="card h-80">
                        @if ($product->status == 'activo')
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Activo</div>
                        @endif
                        <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->name }}" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <p>{{ $product->category_name }}</p>
                                <p>${{ $product->price }}</p>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="/detalle/{{ $product->id }}">Ver detalles</a>
                                <a href="{{ route('carrito.agregar', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
