@extends('cliente/plantilla/app')

@section('Titulo','SYPRA')

@section('contenido')
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');
    </style>
    <body style="background-image: url('https://http2.mlstatic.com/adesivo-de-parede-lavavel-liso-cor-azul-claro-310-x-058-D_NQ_NP_921758-MLB27046683137_032018-F.jpg'); background-size: cover; background-position: center;">
        <section class="bg-light" style="background-image: url('https://img.freepik.com/fotos-premium/cielo-azul-claro-nubes-puede-utilizar-como-fondo_483040-5714.jpg'); background-size: cover; background-position: center;">
        <div class="container text-center py-5 mb-4 ">
            <div class="p-5 mb-4 lc-block">
                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h1 class="display-1 fw-bold" style="font-family: 'Montserrat', sans-serif;" >Servicios y Proyectos Ambientales</h1>
                    </div>
                </div>
                <div class="lc-block mb-5">
                    <div editable="rich">
                        <p class="lead" style="font-size: 30px; text-align: center; color: #333; ">SYPRA es una empresa dedicada a la venta, instalación y mantenimiento de aires acondicionados que ofrece servicios personalizados de calidad&nbsp;</p>
                </div>
                <div class="lc-block mb-2">
                    <a class="btn btn-primary btn-lg" href="/catalogo" role="button">Comprar ahora</a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5 mb-2 lc-block text-center">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h2 class="fw-bold display-4">Nuestros Servicios

                                </h2>
                            </div>
                        </div>
                        <div class="lc-block mb-5">
                            <div editable="rich">
                                <p class="  lead">Aquí podrás encontrar la variedad de servicios con la que contamos.</p>
                            </div>
                        </div>

                    </div>
                </div><!-- /col -->
            </div>
        </div>
        <div class="container-fluid px-xl-4 overflow-hidden">
            <div class="row row-cols-2 row-cols-lg-4 g-lg-5 mb-6">
                <div class="col">
                    <div class="lc-block mb-4">
                        <img class="img-fluid" 
                        src="https://media.istockphoto.com/id/1077105848/es/foto/concepto-de-compras-compra-y-entrega.jpg?s=612x612&w=0&k=20&c=3aULcniZeCknySFht6ZL2w8OvkJu4fgdWincwr308bk=" 
                        sizes="(max-width: 1080px) 100vw, 1080px" 
                        width="1080" 
                        height="1080" 
                        alt="Imagen de ejemplo">
                   
                                       </div><!-- /lc-block -->
                    <div class="lc-block">
                        <div editable="rich">

                            <h2>Servicio de entrega</h2>
                            <p class="lead text-muted">Envios a toda la Republica Mexicana.</p>

                        </div>
                    </div><!-- /lc-block -->
                </div>
                <div class="col">
                    <div class="lc-block mb-4">
                        <img class="img-fluid" 
                        src="https://media.istockphoto.com/id/1316733101/es/foto/servicio-de-aire-acondicionado-en-el-interior-t%C3%A9cnico-de-limpieza-de-aire-acondicionado-abri%C3%B3.jpg?s=612x612&w=0&k=20&c=qpOUDyLZt5gLaQZwaGh-0eO8uXUmWDAT6cg95MoWpok=" 
                        sizes="(max-width: 1080px) 100vw, 1080px" 
                        width="1080" 
                        height="1080" 
                        alt="Imagen de ejemplo">
                   
                                       </div><!-- /lc-block -->
                    <div class="lc-block">
                        <div editable="rich">

                            <h2>Servicios de Instalación y Reparación</h2>
                            <p class="lead text-muted">Ofrecemos este servicio dentro de la Zona Metropolitana de Guadalajara. </p>

                        </div>
                    </div><!-- /lc-block -->
                </div>
                <div class="col">
                    <div class="lc-block mb-4">
                        <img class="img-fluid" 
     src="https://cdn.pixabay.com/photo/2019/07/13/10/25/payment-4334491_1280.jpg" 
     sizes="(max-width: 1024px) 100vw, 1024px" 
     width="1024" 
     height="1024" 
     alt="Imagen de ejemplo">
                
                    </div><!-- /lc-block -->
                    <div class="lc-block">
                        <div editable="rich">

                            <h2>Venta en Línea y Física</h2>
                            <p class="lead text-muted">Asiste a nuestra sucursal o adquiere tu equipo desde esta página.</p>

                        </div>
                    </div><!-- /lc-block -->
                </div>
                <div class="col">
                    <div class="lc-block mb-4">
                        <img class="img-fluid" 
                        src="https://cdn.pixabay.com/photo/2019/05/10/12/36/contact-us-4193401_1280.jpg" 
                        sizes="(max-width: 1024px) 100vw, 1024px" 
                        width="1024" 
                        height="1024" 
                        alt="Imagen de ejemplo">
                   
                                       </div><!-- /lc-block -->
                    <div class="lc-block">
                        <div editable="rich">

                            <h2>Asistencia personalizada</h2>
                            <p class="lead text-muted">Ofrecemos atención personalizada para que elijas correctamente tu equipo.</p>

                        </div>
                    </div><!-- /lc-block -->
                </div>
            </div>
            &nbsp
            &nbsp
            <div class="row">
                <div class="col-md-12">
                    <div class="lc-block text-center">
                        <a class="btn btn-primary btn-lg" href="{{ url('/contacto') }}" role="button">Contáctanos</a>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
            &nbsp
        </div>
        &nbsp
        &nbsp
    </section>
    <div id="lineas">
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5 mb-2 lc-block text-center">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h2 class="fw-bold display-4">Minisplit</h2>
                            </div>
                        </div>
                    </div>
                </div><!-- /col -->
            </div>
        </div>
        <div class="container-fluid px-xl-4">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-lg-5 mb-6 g-3">
                <div class="col text-center">
                    {{-- <a href="{{ url('/linea_azul') }}" class="btn btn-primary btn-lg" role="button"> --}}
                        <div class="lc-block mb-4">
                            &nbsp
                            <img class="img-fluid" role="button" src="https://www.airesbair.com/assets/Equipos_Azul.png" srcset="https://www.airesbair.com/assets/Equipos_Azul.png 1080w">
                        </div>
                        <div class="card-body py-6">
                            <div class="lc-block mb-3">
                                <div editable="rich">
                                    &nbsp
                                    <h3 class="fw-bold">Línea Azul</h3>
                                </div>
                            </div>
                            <div class="lc-block border-bottom border-secondary border-3 col-1 mx-auto mb-3"></div>
                            <div class="lc-block">
                                <div editable="rich">
                                    <p class="fw-light rfs-8">La línea azul ofrece una climatización ecológica y cómoda con instalación fácil y diseño moderno.</p>
                                    &nbsp
                                </div>
                                &nbsp
                            </div>
                            &nbsp
                        </div>
                    </a>
                </div>
                <div class="col text-center">
                    {{-- <a href="{{ url('/linea_azul_inverter') }}" class="btn btn-primary btn-lg" role="button"> --}}
                        <div class="lc-block mb-4">
                            &nbsp
                            <img class="img-fluid" role="button" src="https://www.airesbair.com/assets/Equipos_AzulInverter.png" srcset="https://www.airesbair.com/assets/Equipos_AzulInverter.png 1080w">
                        </div>
                        <div class="card-body py-6">
                            <div class="lc-block mb-3">
                                <div editable="rich">
                                    &nbsp
                                    <h3 class="fw-bold">Línea Azul INVERTER</h3>
                                </div>
                            </div>
                            <div class="lc-block border-bottom border-secondary border-3 col-1 mx-auto mb-3"></div>
                            <div class="lc-block">
                                <div editable="rich">
                                    <p class="fw-light rfs-8">Tecnología Inverter de aire acondicionado que te permite ahorrar hasta un 60% en consumo de energía.</p>
                                    &nbsp
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col text-center">
                    {{-- <a href="{{ url('/linea_espejo') }}" class="btn btn-primary btn-lg" role="button"> --}}
                        <div class="lc-block mb-4">
                            &nbsp
                            <img class="img-fluid" role="button" src="https://www.airesbair.com/assets/Equipos_Espejo.png" srcset="https://www.airesbair.com/assets/Equipos_Espejo.png 1080w">
                        </div>
                        <div class="card-body py-6">
                            <div class="lc-block mb-3">
                                <div editable="rich">
                                    &nbsp
                                    <h3 class="fw-bold">Línea espejo</h3>
                                </div>
                            </div>
                            <div class="lc-block border-bottom border-secondary border-3 col-1 mx-auto mb-3"></div>
                            <div class="lc-block">
                                <div editable="rich">
                                    <p class="fw-light rfs-8">Diseño sofisticado, alta calidad y última tecnología en aire acondicionado para brindar estilo y confort a cualquier espacio.</p>
                                </div>
                                &nbsp
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col text-center">
                    {{-- <a href="{{ url('/linea_platinum') }}" class="btn btn-primary btn-lg" role="button"> --}}
                        <div class="lc-block mb-4">
                            &nbsp
                            <img class="img-fluid" role="button" src="https://www.airesbair.com/assets/Equipos_Platinum.png" srcset="https://www.airesbair.com/assets/Equipos_Platinum.png ">
                        </div>
                        <div class="card-body py-6">
                            <div class="lc-block mb-3">
                                <div editable="rich">
                                    &nbsp
                                    <h3 class="fw-bold">Línea Platinum INVERTER</h3>
                                </div>
                            </div>
                            <div class="lc-block border-bottom border-secondary border-3 col-1 mx-auto mb-3"></div>
                            <div class="lc-block">
                                <div editable="rich">
                                    <p class="fw-light rfs-8">Nuestro producto más innovador, tecnología avanzada Inverter con el máximo ahorro de energía y sistema de calefacción integrado.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

@endsection