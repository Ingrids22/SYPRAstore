@extends('cliente/plantilla/app')

@section('Titulo','SYPRA')

@section('contenido')

<body>
    <div class="container py-4 py-lg-6">
        <div class="row align-items-center flex-lg-row-reverse">
            <div class="col-lg-6 mb-5 mb-lg-0 ">
                <div class="lc-block px-4"><!--  If you want to remove px-4 please add overflow-hidden class to the section -->
                    <div class="position-relative">
                        <div class="lc-block position-absolute top-0 start-0 w-100 h-100 bg-dark mt-4 ms-4"> </div>

                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $product->image_rute) }}" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.airesbair.com/assets/Equipos_Azul_1.png" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.airesbair.com/assets/Equipos_Azul_3.png" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button> --}}
                          </div>              
                          </div>
                          </div>
            </div>
            <div class="col-lg-6 ">
                <div class="lc-block mb-4">
                    <div editable="rich">

                        <h2 class="fw-bold display-5">{{ $product->name}}
                    </div>
                </div>
                <div class="lc-block mb-5">
                    <div editable="rich">


                        <p class="lead text-muted">{{ $product->description}}</p>
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
                            <p>Precio: ${{ $product->price}} MXN</p>
                        </div>

                        {{-- <div class="ms-3 align-self-center" editable="rich">
                            <p>Enfriamiento turbo/Control con base.</p>
                        </div> --}}
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
                            <p>Modelo: {{ $product->id}} </p>
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
                            <p>Disponibilidad: {{ $product->status}}</p>
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
                            <p>Garantía: 10 años</p>
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
                            <p>Panel digital</p>
                        </div>

                        <div class="ms-3 align-self-center" editable="rich">
                            <p>Alarma por falla</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
