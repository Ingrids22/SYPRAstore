@extends('cliente/plantilla/app')

@section('Titulo','SYPRA')

@section('contenido')

<body>
    <div class="container py-4 py-lg-6">
        <div class="row align-items-center flex-lg-row-reverse">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="lc-block px-4">
                    <div class="position-relative">
                        <div class="lc-block position-absolute top-0 start-0 w-100 h-100 bg-dark mt-4 ms-4"> </div>

                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $product->image_route) }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $product->image_route) }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $product->image_route) }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
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
                        <p class="lead text-muted">{{ $product->description }}</p>
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
                            <p>Modelo: {{ $product->id}}</p>
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
                            <p>Disponibilidad: {{ $product->status }}</p>
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
                            <p>{{ $product->category_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lc-block mb-2">
                <a class="btn btn-primary btn-lg" href="javascript:history.back()" role="button">Regresar</a>
            </div>
        </div>
    </div>
</body>

@endsection
