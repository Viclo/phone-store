@extends('auth.login')
@section('menu')
<li class=""><a href="/">PHONEBOL</a></li>
<li class="nav-item dropdown ">
<a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">CATALOGO<i class="icon-arrow-down"></i></a>
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
<li><a href="/#precios">Precios</a></li>
<li><a href="{{ url('contacto') }}">Contactanos</a></li>
@endsection

@section('contenido')

<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
            <div class="fh5co-narrow-content">
            <div class="row"> 
                                <h1 align="center">{{$telefono->nombre}}</h1>
                                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="{{ url($telefono->imagen) }}" width="500" height="500"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-12  animate-box" data-animate-effect="fadeInLeft">
                                        <section class="use_sasu padding_top">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="single_feature">
                                                                <i class="fas fa-tag fa-5x " style="color:#02387c;"></i>
                                                                <div class="single_feature_part">
                                                                    
                                                                    <img src="img/icon/pantalla.png" alt="" width="50" height="50">
                                                                    <h4>Descripción</h4>
                                                                    <p>{{$telefono->descripcion}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <img src="img/animate_icon/Ellipse_1.png" alt="" class="feature_icon_1 custom-animation1">
                                            </section>
                                    
                                    
            
                                </div>
                            </div>
            
                        </div>
        
            
            <div class="row work-pagination animate-box" data-animate-effect="fadeInLeft">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0">
            
                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                        
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                        <a href="#"><i class="icon-th-large"></i></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    
                    </div>
                </div>
            </div>
            
            </div>
            </div>
@endsection