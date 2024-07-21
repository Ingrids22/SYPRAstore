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

<div class="container" id="div_botones">
    <div class="d-flex flex-wrap">
        <!-- Formulario de filtro por categoría -->
        <form action="/catalogo" method="GET" class="d-flex align-items-center" id="category-filter-form">
            @csrf
            <select class="form-select me-2" id="filtroproducts" name="categories">
                <option value="">Seleccionar categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </form>
        &nbsp;
        <!-- Formulario de búsqueda por nombre -->
        <form action="/catalogo" method="GET" class="d-flex align-items-center">
            @csrf
            <input type="text" name="nombre" placeholder="Buscar producto" class="form-control me-2">
            <button type="submit" class="btn btn-outline-dark">Buscar</button>
        </form>
        &nbsp;
        <!-- Botón para ver todos los productos -->
        <form action="/catalogo" method="GET" class="d-flex align-items-center">
            <button type="submit" class="btn btn-outline-dark">Ver todos los productos</button>
        </form>
        &nbsp;
        {{-- <form action="{{ route('cliente.ordenes') }}" method="GET" class="d-flex align-items-center">
            <button type="submit" class="btn btn-outline-dark">
                Ver mis pedidos
            </button>
        </form> --}}
    </div>
    @if (session('status'))
        <div class="alert alert-info mt-3">
            {{ session('status') }}
        </div>
    @endif
</div>

<section class="py-1">
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
                                <p>{{ $product->category->name ?? 'Sin categoría' }}</p>
                                <p>${{ number_format($product->price, 2) }}</p>
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

<script>
document.getElementById('filtroproducts').addEventListener('change', function() {
    document.getElementById('category-filter-form').submit();
});
</script>

@endsection
