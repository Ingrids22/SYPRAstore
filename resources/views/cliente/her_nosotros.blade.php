@extends('cliente/plantilla/app')

@section('Titulo','SYPRA')

@section('contenido')

<body>
    <body style="background-image: url('https://http2.mlstatic.com/adesivo-de-parede-lavavel-liso-cor-azul-claro-310-x-058-D_NQ_NP_921758-MLB27046683137_032018-F.jpg'); background-size: cover; background-position: center;">
    <section>
        <div class="container-fluid px-xl-4 py-5">
            <div class="row align-items-center g-xl-4 py-5">
                <div class="col-sm-8 col-lg-6">
                    <img src="https://www.airesbair.com/assets/BAirHome_HomeFondo.jpg" 
                    class="d-block mx-lg-auto img-fluid" 
                    alt="Imagen de ejemplo" 
                    loading="lazy">
                               </div>
                <div class="col-lg-6">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h2 class="fw-bold display-2">Nuestra<br>Compañía</h2>
                        </div>
                    </div>
    
                    <div class="lc-block mb-5">
                        <div editable="rich">
                            <p class="rfs-8"> Nuestras ventajas sobre otras marcas es la variedad de lineas de aires acondicionados diseñados para diferentes necesidades y estilos de vida. Modernos, ecológicos, eficientes y de la más alta tecnología, favoreciendo la economía de las familia o empresas en el ahorra de energía.
                            </p>
                        </div>
                    </div>
    
                    {{-- <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start"><a class="btn btn-primary px-4 me-md-2" href="#" role="button">Más información</a> --}}
                        {{-- <a class="btn btn-outline-secondary px-4" href="#equipo" role="button">Equipo de trabajo</a> --}}
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    <section>
        <div id="equipo" class="container-fluid py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5 mb-2 lc-block text-center">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h2 class="fw-bold display-4">Opiniones de customers</h2>
                            </div>
                        </div>
    
    
                    </div>
                </div><!-- /col -->
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col mb-5 mb-md-0">
                    <div class="lc-block">
                        <div editable="rich">
                            <p><em class="text-muted"> "La empresa de aires acondicionados es simplemente excepcional. Su atención al cliente es impecable, siempre dispuestos a resolver cualquier duda con rapidez y profesionalismo. Los equipos que ofrecen son de alta calidad y eficiencia."
    
                                </em></p>
                        </div>
                    </div><!-- /lc-block -->
                    <div class="lc-block d-flex align-items-center">
                        <div class="lc-block">
                            <img class="img-fluid rounded-circle me-2" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=1080" srcset="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=1080 1080w, https://images.unsplash.com/photo-1535713875002-d1d0cf377fde??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1535713875002-d1d0cf377fde??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1535713875002-d1d0cf377fde??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1535713875002-d1d0cf377fde??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w" sizes="(max-width: 1080px) 100vw, 1080px" width="64" height="64" alt="Photo by Alex Suprun">
                        </div>
                        <div class="lc-block">
                            <div editable="rich">
                                <p>Miguel</p>
                            </div>
                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
                <div class="col mb-5 mb-md-0">
                    <div class="lc-block">
                        <div editable="rich">
                            <p><em class="text-muted"> “Estoy completamente satisfecho con la empresa de aires acondicionados. La instalación de mi equipo fue rápida y sin complicaciones, demostrando un servicio eficiente. Además, la asesoría técnica proporcionada me ayudó a elegir el sistema perfecto.”
    
                                </em></p>
                        </div>
                    </div><!-- /lc-block -->
                    <div class="lc-block d-flex align-items-center">
                        <div class="lc-block">
                            <img class="img-fluid rounded-circle me-2" src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8Mnx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=1080" srcset="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8Mnx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=1080 1080w, https://images.unsplash.com/photo-1607990281513-2c110a25bd8c??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8Mnx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1607990281513-2c110a25bd8c??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8Mnx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1607990281513-2c110a25bd8c??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8Mnx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1607990281513-2c110a25bd8c??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8Mnx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w" sizes="(max-width: 1080px) 100vw, 1080px" width="64" height="64" alt="Photo by Sigmund">
                        </div>
                        <div class="lc-block">
                            <div editable="rich">
                                <p>Alfonso</p>
                            </div>
                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
                <div class="col mb-5 mb-md-0">
                    <div class="lc-block">
                        <div editable="rich">
                            <p><em class="text-muted"> "Desde el primer contacto, su equipo demostró conocimiento y profesionalismo. La instalación fue realizada con precisión, y ahora disfruto de un hogar fresco y confortable. Sin duda, los recomendaría a familiares y amigos."
    
                                </em></p>
                        </div>
                    </div><!-- /lc-block -->
                    <div class="lc-block d-flex align-items-center">
                        <div class="lc-block">
                            <img class="img-fluid rounded-circle me-2" src="https://images.unsplash.com/photo-1577744168855-0391d2ed2b3a?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=1080" srcset="https://images.unsplash.com/photo-1577744168855-0391d2ed2b3a?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=1080 1080w, https://images.unsplash.com/photo-1577744168855-0391d2ed2b3a??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1577744168855-0391d2ed2b3a??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1577744168855-0391d2ed2b3a??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1577744168855-0391d2ed2b3a??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8bWFufGVufDB8Mnx8fDE2NDcyODAyMzM&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w" sizes="(max-width: 1080px) 100vw, 1080px" width="64" height="64" alt="Photo by Patrick Daley">
                        </div>
                        <div class="lc-block">
                            <div editable="rich">
                                <p>Richard</p>
                            </div>
                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>
    </section>
    <section class="bg-light" style="background-image: url('https://http2.mlstatic.com/adesivo-de-parede-lavavel-liso-cor-azul-claro-310-x-058-D_NQ_NP_921758-MLB27046683137_032018-F.jpg'); background-size: cover; background-position: center;">
        <div class="container-fluid px-xl-4 py-6">
            <div class="row align-items-center g-xl-4 py-5">
                <div class="col-lg-6 mb-4 text-center text-lg-start">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h2 class="fw-bold display-3 ">Ofrecemos productos<br>de calidad para tu servicio.
    
                            </h2>
                        </div>
                    </div>
    
                    <div class="lc-block mb-4">
                        <div editable="rich">
                            <p class="rfs-8 text-muted">Somos una empresa verde, socialmente
                                responsable y comprometida con el
                                bienestar de nuestra comunidad.&nbsp;</p>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
    
                    <div class="lc-block"><a class="btn btn-primary px-4 me-md-2" href="{{ url('/contacto') }}" role="button">Contactanos</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://media.istockphoto.com/id/1464462569/es/foto/familia-feliz-descansando-bajo-aire-acondicionado-en-la-pared-beige-en-casa.jpg?s=612x612&w=0&k=20&c=UPO95WRF6fkimceOKYWlBBYLzQ1HbB1Zlbqp0ULnpOQ=" 
                    class="d-block mx-lg-auto img-fluid" 
                    alt="Imagen de ejemplo" 
                    loading="lazy" 
                    width="800" 
                    height="568">
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