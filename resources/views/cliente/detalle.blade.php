@extends('cliente.plantilla.app')

@section('Titulo','Detalle del Producto')

@section('contenido')

<div class="container py-4 py-lg-6">
    <div class="row align-items-center flex-lg-row-reverse">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="lc-block px-4">
                <div class="position-relative">
                    <div class="lc-block position-absolute"></div>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($product->images as $index => $image)
                                @if($image->route)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($product->images as $index => $image)
                                @if($image->route)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->route) }}" class="d-block w-100" alt="Imagen del producto">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="lc-block mb-4">
                <div editable="rich">
                    <h2 class="fw-bold display-5">{{ $product->name }}</h2>
                </div>
            </div>
            <div class="lc-block mb-5">
                <div editable="rich">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
            <div class="lc-block d-sm-flex align-items-center mb-4 overflow-hidden position-relative">
                <div class="d-inline-flex">
                    <div>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"></path>
                        </svg>
                    </div>
                    <div class="ms-3 align-self-center" editable="rich">
                        <p>Precio: ${{ $product->price }} MXN</p>
                    </div>
                </div>
            </div>
            <div class="lc-block d-sm-flex align-items-center mb-4">
                <div class="d-inline-flex">
                    <div>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"></path>
                        </svg>
                    </div>
                    <div class="ms-3 align-self-center" editable="rich">
                        <p>Existencia: {{ $product->existence }}</p>
                    </div>
                </div>
            </div>
            <div class="lc-block d-sm-flex align-items-center mb-4">
                <div class="d-inline-flex">
                    <div>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon" class="text-success">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"></path>
                        </svg>
                    </div>
                    <div class="ms-3 align-self-center" editable="rich">
                        <p>Categoría: {{ $product->category->name }}</p>
                    </div>
                </div>
            </div>
            <div class="lc-block mb-3">
                <a href="{{ route('carrito.agregar', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Añadir al carrito</a>
            </div>
        </div>
    </div>
</div>

@endsection
