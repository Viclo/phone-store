@extends('auth.login')




@section('menu')
<li class="fh5co-active"><a href="/">PHONEBOL</a></li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">CATALOGO<i class="icon-arrow-down"></i></a>
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('celular') }}">CELULARES</a>
    <a class="dropdown-item" href="{{ url('tableta') }}">TABLET'S</a>
    <a class="dropdown-item" href="{{ url('laptops') }}">lAPTOP'S</a>
    <a class="dropdown-item" href="{{ url('accesorios') }}">ACCESORIOS</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ url('ofertas') }}">EN OFERTA</a>
</div>
</li>
<li><a href="{{ url('nosotros') }}">Nosotros</a></li>
<li><a href="#precios">Precios</a></li>
<li><a href="{{ url('contacto') }}">Contactanos</a></li>
@endsection


@section('banner')
<div class="jumbotron ">

        <h1 class="display-4 font-weight-bold text-center" style="color: white">ACTUALIZATE!!!</h1>
        <h3  style="color: white" class=" text-center font-weight-bold">Actualizate y Ahorra con nuestro modelo de negocio unico</h3>
        <hr class="my-4">
        <h2 style="color: white" class=" text-center font-weight-bold">Pioneros con nuestra forma de pago en nuestra forma de negociar con mas de 20 años de experiencia</h2>
    
        <p class="lead text-center">
        <a class="btn btn-primary btn-lg" onclick="location.href='#primero'" role="button">NEGOCIAR</a>
        </p>
    </div>
@endsection


@section('contenido')




<div class="fh5co-narrow-content" id="primero" >
    <div class="row animate-box" data-animate-effect="fadeInLeft">
        <h1 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Negociar</h1>
        <img src="img/uno.jpg" class="img-fluid" alt="Responsive image" style="max-width: 100%;">
        <p>Con esta opción ofrecemos a nuestros clientes de PHONEBOL pueden buscar uno de nuestros celulares y llevarselo dejando como parte de pago su celular actual, apenas registre sus datos, nuestro personal se contactara con usted a la brevedad posible para 
            poder dar los ultimos pasos, en el que podran quedar con el precio y la nueva tarifa en cualquiera de nuestras 2 sucursales: Ic Norte o HiperMaxi, facilitando y disminuyendo el costo de su producto deseado. </p>
            <p>Paso 1 : Elige el Telefono de nuestro CATALOGO</p>
            <p>Paso 2 : Manda tus datos personales junto con tu propuesta de telefono</p>
            <p>Paso 3 : Esperar que nuestro personal se comunique con usted, sea paciente</p>
            <button data-animate-effect="fadeInLeft" type="button" class="btn btn-primary" onclick="location.href='{{ url('celular') }}'">Ver Novedades</button>
    
        </div>

</div>

<div class="fh5co-narrow-content">
        <h1 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Galería</h1>
   
    <div class="container">
        <div class="row " data-animate-effect="fadeInLeft">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Bienvenidos a Phonebol - Sucursal Ic Norte"
                       data-image="img/1.1.png"
                       data-target="#image-gallery">
                       <img class="img-thumbnail" src="img/1.1.png" alt="Another alt text">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Bienvenidos a Phonebol - Sucursal Ic Norte"
                       data-image="img/2.JPG"
                       data-target="#image-gallery">
                        <img class="img-thumbnail" src="img/2.JPG" alt="Another alt text">
                    </a>
                </div>
    
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Personal Altamente Calificado - Sucursal Ic Norte"
                       data-image="img/3.JPG"
                       data-target="#image-gallery">
                       <img class="img-thumbnail" src="img/3.JPG" alt="Another alt text">
                    </a>
                </div>
             
            </div>
            <div class="row">
                
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Personal Altamente Calificado - Sucursal Ic Norte"
                        data-image="img/4.png"
                        data-target="#image-gallery">
                        <img class="img-thumbnail" src="img/4.png" alt="Another alt text">
                    </a>
                </div>


                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Personal Altamente Calificado - Sucursal Ic Norte"
                        data-image="img/5.png"
                        data-target="#image-gallery">
                        <img class="img-thumbnail" src="img/5.png" alt="Another alt text">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Presentes Siempre Con Nuestro Personal - Sucursal Ic Norte"
                        data-image="img/6.png"
                        data-target="#image-gallery">
                        <img class="img-thumbnail" src="img/6.png" alt="Another alt text">
                    </a>
                </div>
            </div>
            <div class="row">
                
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Presentes Siempre Con Nuestro Personal - Sucursal Ic Norte"
                                data-image="img/7.JPG"
                                data-target="#image-gallery">
                                <img class="img-thumbnail" src="img/7.JPG" alt="Another alt text">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                                data-image="img/8.JPG"
                                data-target="#image-gallery">
                                <img class="img-thumbnail" src="img/8.JPG" alt="Another alt text">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice"
                                data-image="img/9.JPG"
                                data-target="#image-gallery">
                                <img class="img-thumbnail" src="img/9.JPG" alt="Another alt text">
                            </a>
                        </div>
            </div>
    
    
            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>
    
                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fh5co-narrow-content">
    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">NOVEDADES</h2>
    <div class="row animate-box" data-animate-effect="fadeInLeft">
        <div class="table-responsive col-md-12 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <table>

                <tr>
                        @foreach($telefonos as $telefono)
                        <td>
                            <a href="/celular/{{$telefono->id}}">
                            <img src="{{$telefono->imagen}}" alt="Free HTML5 Website Template by FreeHTML5.co" width="300px" height="300px">
                                <h3 class="fh5co-work-title">{{$telefono->nombre}}</h3>
                                <p>{{$telefono->nombre_marca}}</p>
                            </a>
                        </td>
                        @endforeach
                    
                </tr>

        </table>
    </div>
        <div class="clearfix visible-md-block"></div>
        
    </div>
</div>


<div class="fh5co-narrow-content">
    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">OCASIONALES</h2>
    <div class="row animate-box" data-animate-effect="fadeInLeft">
            <div class="table-responsive col-md-12 col-sm-6 col-xs-6 col-xxs-12 work-item">
                    <table>
        
                        <tr>
                                @foreach($telefonosof as $telefon)
                                <td>
                                    <a href="/ofertas/{{$telefon->id}}">
                                    <img src="{{$telefon->imagen}}" alt="Free HTML5 Website Template by FreeHTML5.co" width="300px" height="300px">
                                        <h3 class="fh5co-work-title">{{$telefon->nombre}}</h3>
                                        <p>{{$telefon->nombre_marca}}</p>
                                    </a>
                                </td>
                                @endforeach
                            
                        </tr>
        
                </table>
            </div>
        <div class="clearfix visible-md-block"></div>
        
    </div>
</div>
<div class="fh5co-cards">
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Nosotros</h2>

        <div class="fh5co-flex-wrap">
            <div class="fh5co-card animate-box" data-animate-effect="fadeInLeft">
                <h5>Misión</h5>
                <p>Nuestra misión es la de proveer tecnología de última generación con total garantía, que permitan a nuestros clientes alcanzar una mejor productividad y competitividad 
                tanto en desarrollo personal como laboral. Con un nuevo sistema mejorado de negociación de productos, siempre pensando en reducir costos para nuestros clientes.</p>
            </div>
            <div class="fh5co-card animate-box" data-animate-effect="fadeInLeft">
                <h5>Visión</h5>
                <p>Convertirnos en una empresa icono del mercado de distribución y comercialización  en el sector de telefonía movil, distinguiéndonos  por atender con los mismos estándares  de calidad a clientes y proyectos de diversas magnitudes y ámbitos.</p>
            </div>
        </div>  
        
    </div>
</div> 
<div class="fh5co-testimonial" >
    <div class="fh5co-narrow-content">
        <div class="owl-carousel-fullwidth animate-box" data-animate-effect="fadeInLeft">
        <div class="item">
            <figure>
                <img src="images/testimonial_person2.jpg" alt="Free HTML5 Bootstrap Template">
            </figure>
            <p class="text-center quote" style="color:white;">&ldquo;Estoy contento con el teléfono y con la oferta recibida. Quería un buen smarthphone que pudiera hacer todo lo básico y el lugar cumplía todos los requisitos. Luego el servicio de atención al cliente me ayudó a conseguir exactamente lo que estaba buscando. &rdquo; <cite class="author">&mdash; Andres A. Andia</cite></p>
        </div>
        <div class="item">
            <figure>
                <img src="images/testimonial_person3.jpg" alt="Free HTML5 Bootstrap Template">
            </figure>
            <p class="text-center quote" style="color:white;">&ldquo;Phonebol es la única empresa en Cochabamba, en el que sientes que estás en tu casa, el trato es increíble y siempre con una sonrisa. Aparte de la innovación del sistema de parte de pago y ser pioneros en el mercado de celulares web&rdquo;<cite class="author">&mdash; Bruno G. Salazar</cite></p>
        </div>
        <div class="item">
            <figure>
                <img src="images/testimonial_person4.jpg" alt="Free HTML5 Bootstrap Template">
            </figure>
            <p class="text-center quote" style="color:white;">&ldquo;Tanto el dueño como sus empleados son muy cordiales y amigables. No me arrepiento de haber ido. Me encanto la manera poder conseguir los celulares y como manejan la forma de pago.&rdquo;<cite class="author">&mdash; Freddy Delgadillo</cite></p>
        </div>
        <div class="item">
            <figure>
                <img src="images/testimonial_person5.jpg" alt="Free HTML5 Bootstrap Template">
            </figure>
            <p class="text-center quote" style="color:white;">&ldquo;La mejor atención que he visto en mucho tiempo, realmente merecen la confiaza que se les brinda, muy orgulloso que sea en cochabamba&rdquo;<cite class="author">&mdash; Geovanny B. Encinas</cite></p>
        </div>
      </div>
    </div>
</div>
<div class="fh5co-narrow-content" id="precios">
        <section class="pricing py-5">
                <div class="container">
                  <div class="row">
                    <!-- Free Tier -->
                    <div class="col-lg-5">
                      <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Desde</i></h5>
                            <h6 class="card-price text-center">$29</h6>
                            <h6 class="card-price text-center">Telefonos Gama Baja</h6>
                          <hr>
                          <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                          </ul>
                          <a href="#" class="btn btn-block btn-primary text-uppercase">Ver</a>
                        </div>
                      </div>
                    </div>
                    <!-- Plus Tier -->
                    <div class="col-lg-5">
                      <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Desde</h5>
                                <h6 class="card-price text-center">$100</h6>
                                <h6 class="card-price text-center">Telefonos Gama Media</h6>
                          <hr>
                          <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Nokia 106</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Nokia 105</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Nokia 2 Re</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                          </ul>
                          <a href="#" class="btn btn-block btn-primary text-uppercase">Ver</a>
                        </div>
                      </div>
                    </div>
                    <!-- Pro Tier -->
                    
                  </div>
                </div>
              </section>
</div>
<div class="fh5co-narrow-content">
        <section class="pricing py-5">
                <div class="container">
                  <div class="row">
                    <!-- Free Tier -->
                    <div class="col-lg-5">
                      <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                          <h5 class="card-title text-muted text-uppercase text-center">Desde</h5>
                          <h6 class="card-price text-center">$295</h6>
                          <h6 class="card-price text-center">Telefonos Alta</h6>
                          <hr>
                          <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                          </ul>
                          <a href="#" class="btn btn-block btn-primary text-uppercase">Ver</a>
                        </div>
                      </div>
                    </div>
                    <!-- Plus Tier -->
                    <div class="col-lg-5">
                      <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Oferta</h5>
                                <h6 class="card-price text-center">$350</h6>
                                <h6 class="card-price text-center">Ocasionale</h6>
                          <hr>
                          <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                          </ul>
                          <a href="#" class="btn btn-block btn-primary text-uppercase">Ver</a>
                        </div>
                      </div>
                    </div>
                    <!-- Pro Tier -->
                    
                  </div>
                </div>
              </section>
</div>



<div class="fh5co-narrow-content">
    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Qué le podemos <span>Ofrecer</span></h2>
    <div class="row">
        <div class="col-md-6">
            <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="fh5co-text">
                    <h3>Teléfonos</h3>
                    <p>Ofrecemos Variedad de Teléfonos de ultima generación apenas salen al mercado. </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                    <i class="icon-headphones"></i>
                </div>
                <div class="fh5co-text">
                    <h3>Accesosrios</h3>
                    <p>Gran variedad de accesorios para celulares como ser cases, protectores, auriculares y muchas cosas más. </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                    <i class="icon-phone"></i>
                </div>
                <div class="fh5co-text">
                    <h3>Atención al Cliente</h3>
                    <p>Puede contactarse con nosotrós de manera sencilla cotizar y adquirir lo que deseé, ya sea con nuestros telefonos o como con la página.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                <div class="fh5co-icon">
                    <i class="icon-user"></i>
                </div>
                <div class="fh5co-text">
                    <h3>Mantenimiento</h3>
                    <p>Ofrecemos un servicio de mantenimiento, con experertos con mas de 20 años de experiencía trabajando siempre para dar lo mejor. </p>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="fh5co-counters" style="background-image: url(images/fondohome.jpg);" data-stellar-background-ratio="0.5" id="counter-animate">
    <div class="fh5co-narrow-content animate-box">
        <div class="row" >
            <div class="col-md-4 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="67" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Negocios en Ejecucion</span>
            </div>
            <div class="col-md-4 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="130" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Trabajos Completados</span>
            </div>
            <div class="col-md-4 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="27232" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Clientes trabajando con Phonebol</span>
            </div>
        </div>
    </div>
</div>


<div class="fh5co-cards">
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Futuros Proyectos</h2>

        <div class="fh5co-flex-wrap">
            <div class="fh5co-card animate-box" data-animate-effect="fadeInLeft">
                <h5>Sucursal</h5>
                <p>Gracias a la preferenciá de nuestros clientes se esta propuso la idea de abrir nuevas sucursales con la intención de facilitar a nuestros clientes contactarnos y disfrutar de nuestros productos.</p>
            </div>
            <div class="fh5co-card animate-box" data-animate-effect="fadeInLeft">
                <h5>Mercado</h5>
                <p>Nuestra empresa planea impulsar nuevas fuentes de trabajo dando una oportunidad a nuestra propia gente demostrando el gran valor y respeto que tenemos hacia nuestra sociedad.</p>

            </div>

        </div>  
        
    </div>
</div>
<div class="fh5co-narrow-content">
    <div class="row">
        <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">Acerca de  Nosotros</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
            <p class="fh5co-lead">Desde 1998 importando innovación tecnológica en telefonía. Con un sistema de negociones Pionero en el mercado, con mas de 20 años de experiencia.</p>
        </div>
        <div class="col-md-7 col-md-push-1">
            <div class="row">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <p>Phonebol trabaja con las normativas claras cordialidad, confianza y rapides, para la mejor experiencia del nuestros clientes.</p>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <p>Para un servició completo ofrecemos ayuda con los equipos con posibles problemas y gente capacitada para el mantenimiento y reparación de sus celulares</p>
                </div>
            </div>
        </div>
    </div>
    <section class="customer-logos slider">
        <div class="slide"><img src="images/11.png"></div>
        <div class="slide"><img src="images/12.png"></div>
        <div class="slide"><img src="images/13.png"></div>
        <div class="slide"><img src="images/15.png"></div>
        <div class="slide"><img src="images/17.png"></div>
        <div class="slide"><img src="images/19.png"></div>
        <div class="slide"><img src="images/20.png"></div>
     </section>
</div>
@endsection