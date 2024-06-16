
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('Titulo')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="css/stylespregfrec.css">

        <link href="{{ asset('css/stylecarrito.css') }}" rel="stylesheet">
        <link href="{{ asset('css/stylefooter.css') }}" rel="stylesheet">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/y-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/assets/css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/pruebas_css/operaciones2.css">



    </head>
    <style>
        .navbar-brand img {
            max-width: 130px; 
            height: auto;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-circle {
            width: 60px;
            height: 60px;
            padding: 0;
            border-radius: 50%;
            overflow: hidden;
        }

        .btn-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand">
                    <img src="https://scontent.fgdl3-1.fna.fbcdn.net/v/t39.30808-6/421587958_903179931599301_6132880923810736407_n.png?stp=dst-jpg&_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_ohc=XFjUDsK9TxMAb5s55Jt&_nc_ht=scontent.fgdl3-1.fna&oh=00_AfCUWn3Abpg7FpnehhbGglVm7pvquylaIBe3ctjmJ-As6w&oe=6630CB39" alt=></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/homepage') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/nosotros') }}">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/contacto') }}">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/catalogo') }}">Catálogo</a></li>
                        {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/linea_azul') }}">Linea Azul</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/linea_azul_inverter') }}">Linea Azul Inverter</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/linea_espejo') }}">Linea Espejo</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/linea_platinum') }}">Linea Platinum</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                    <form class="d-flex justify-content-between align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 main-section">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="row total-header-section">
                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                            </div>
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                            </div>
                                        </div>
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <div class="row cart-detail">
                                                    <div class="col-lg-5 col-sm-4 col-4 cart-detail-img">
                                                        <img src="{{ asset('storage/' . $details['image']) }}"/>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <p>{{ $details['name'] }}</p>
                                                        <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <a href="{{ route('carrito.mostrar') }}" class="btn btn-primary btn-block">View all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    <br/>
                    <div class="container">
                      
                        @if(session('success'))
                            <div class="alert alert-success">
                              {{ session('success') }}
                            </div> 
                        @endif
                        
                    </div>
                </div>
            </div>
                        <br/>
                        <div class="d-flex">
                            <a href="{{ url('/login') }}" class="btn btn-primary btn-circle">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto de Usuario" class="img-fluid rounded-circle" width="30" height="30">
                            </a>
                        </div>
                    </form>
        </nav>
        @yield('contenido')
        <header>
        </header>
        <section class="py-5">
        </section>
        <footer class="footer-section">
            <div class="container">
                <div class="footer-cta pt-5 pb-5">
                   
                </div>
                <div class="footer-content pt-5 pb-5">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 mb-50">
                            <div class="footer-widget">
                                <div class="footer-logo">
                                    <a href="#"><img src="https://aireacondicionadosypra.com/wp-content/uploads/2021/03/sypra_logo_300x200.png" class="img-fluid" alt="logo"></a>
                                </div>
                                <div class="footer-text">
                                    <p>Aires Acondicionados SYPRA<br>
                                        Dirección: Alameda #402, Col. Centro<br>

                                    </p>
                                </div>
                                <div class="footer-social-icon">
                                    <span>Siguenos</span>
                                    <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                    <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                            <div class="footer-widget">
                                <div class="footer-widget-heading">
                                    <h3>Useful Links</h3>
                                </div>
                                <ul>
                                    <li><a href="{{ url('/homepage') }}">Homepage</a></li>
                                    <li><a href="{{ url('/servicios') }}">Servicios</a></li>
                                    <li><a href="{{ url('/catalogo') }}">Catálogo</a></li>
                                    <li><a href="{{ url('/contacto') }}">Contacto</a></li>
                                    <li><a href="{{ url('/nosotros') }}">Sobre nosotros</a></li>
                                    <li><a href="#">Llamanos</a></li>
                                    <li><a href="#">Envíos</a></li>
                                    <li><a href="#">Facturación</a></li>
                                    <li><a href="#">Preguntas Frecuentes</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                            <div class="footer-widget">
                                <div class="footer-widget-heading">
                                    <h3>Suscribete</h3>
                                </div>
                                <div class="footer-text mb-25">
                                    <p>No te pierdas nuestros nuevos productos, servicios y promociones.</p>
                                </div>
                                <div class="subscribe-form">
                                    <form action="#">
                                        <input type="text" placeholder="Email">
                                        <button><i class="fab fa-telegram-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2018, All Right Reserved <a href="https://codepen.io/anupkumar92/">Anup</a></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="{{ url('/terminos') }}">Términos</a></li>
                                    <li><a href="{{ url('/avisopriv') }}">Privacidad</a></li>
                                    <li><a href="#">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/pruebas_js/operaciones3.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>