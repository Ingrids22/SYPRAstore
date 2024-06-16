@extends('cliente/plantilla/app')

@section('Titulo','Términos y Condiciones')

@section('contenido')
<section class="faq-section">
    <div class="container">
      <div class="row">
                        <!-- ***** FAQ Start ***** -->
                        <div class="col-md-6 offset-md-3">
    
                            <div class="faq-title text-center pb-3">
                                <h2>FAQ</h2>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <div class="faq" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="faqHeading-1">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                                <link rel="stylesheet" href="css/pregfrec.css">
                                                <span class="badge">1</span>¿Qué tipo de aire acondicionado necesito para mi espacio?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Para determinar el tipo de aire acondicionado adecuado para tu espacio, es fundamental considerar los metros cuadrados del área a climatizar. Generalmente, la capacidad de enfriamiento de los aires acondicionados se mide en toneladas. Aquí hay una guía básica:<br>
                                                <br>Para habitaciones de hasta 20 m², se recomienda un aire acondicionado de 1 tonelada.
                                                <br>Para habitaciones entre 20 m² y 35 m², se recomienda un aire acondicionado de 1.5 toneladas.
                                                <br>Para habitaciones entre 35 m² y 50 m², se recomienda un aire acondicionado de 2 toneladas.<br>
                                                <br>Sin embargo, la ubicación del aire acondicionado también es crucial para su eficiencia. Te recomendamos programar una visita con nuestros técnicos especializados, quienes pueden evaluar tu espacio y determinar la mejor ubicación para el equipo.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-2">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                                <span class="badge">2</span>¿Cómo sé si necesito un equipo de ahorro de energía?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Si deseas reducir tus costos de energía y contribuir al cuidado del medio ambiente, un equipo de aire acondicionado de bajo consumo es ideal para ti. Estos equipos están diseñados con tecnología avanzada para maximizar la eficiencia energética. Busca aires acondicionados con calificaciones de eficiencia energética (EER) altas o etiquetas Energy Star, que indican que el equipo cumple con los estándares de eficiencia.<br>
                                                <br>Nuestros técnicos pueden asesorarte en la elección del equipo más eficiente según tus necesidades y preferencias.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-3">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                                <span class="badge">3</span>¿Cuál es la vida útil de un aire acondicionado?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>La vida útil promedio de un aire acondicionado es de aproximadamente 10 a 15 años. Sin embargo, esto puede variar según el uso y el mantenimiento del equipo. Realizar mantenimientos regulares y utilizar el equipo de manera adecuada puede prolongar su vida útil.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-4">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                                <span class="badge">4</span> ¿Cada cuánto tiempo debo darle mantenimiento a mi aire acondicionado?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Se recomienda realizar el mantenimiento del aire acondicionado al menos una vez al año. Un mantenimiento regular ayuda a garantizar que el equipo funcione de manera eficiente y puede prevenir problemas mayores. Durante el mantenimiento, nuestros técnicos revisarán y limpiarán los componentes clave del equipo, asegurando su óptimo rendimiento.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-5">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                                <span class="badge">5</span> ¿Ofrecen servicios de instalación para los aires acondicionados que compro en su tienda en línea?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                        <div class="card-body">
                                            <p> Sí, ofrecemos servicios completos de instalación para todos los aires acondicionados comprados en nuestra tienda en línea. Nuestros técnicos capacitados se encargarán de la instalación, asegurándose de que el equipo funcione correctamente desde el primer día.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-6">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6" data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                                <span class="badge">6</span> ¿Puedo programar una visita técnica antes de comprar un aire acondicionado?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>¡Por supuesto! Ofrecemos visitas técnicas para evaluar tu espacio y recomendarte el equipo de aire acondicionado más adecuado. Simplemente contáctanos para agendar una cita, y uno de nuestros técnicos especializados te visitará para brindarte asesoría personalizada.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-7">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-7" data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                                                <span class="badge">7</span>¿Qué garantías ofrecen en sus productos y servicios?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Todos nuestros aires acondicionados cuentan con la garantía del fabricante, que generalmente cubre defectos de fabricación y problemas relacionados con el funcionamiento del equipo. Además, ofrecemos una garantía adicional en nuestros servicios de instalación para asegurar tu completa satisfacción.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-8">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-8" data-aria-expanded="false" data-aria-controls="faqCollapse-8">
                                                <span class="badge">8</span>¿Cómo puedo contactarlos si tengo más preguntas?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-8" class="collapse" aria-labelledby="faqHeading-8" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Puedes contactarnos a través de nuestro formulario de contacto en el sitio web, por teléfono, o mediante nuestras redes sociales. También ofrecemos un chat en vivo en nuestro sitio web para asistencia inmediata.</p>
                                        </div>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    </section>
@endsection