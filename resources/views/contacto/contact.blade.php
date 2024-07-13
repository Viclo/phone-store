@extends('auth.login')

@section('menu')
<li ><a href="/">PHONEBOL</a></li>
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
<li><a href="{{ url('contacto') }}">Precios</a></li>
<li class="fh5co-active"><a href="{{ url('contacto') }}">Contactanos</a></li>
@endsection

@section('contenido')

<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.943682741264!2d-66.15303262884638!3d-17.372540544388542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e374199a304dbb%3A0x450587ff8b3d9846!2sIC+Norte!5e0!3m2!1sen!2sbo!4v1547841467896" width="100%" height="650" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    
    <div class="fh5co-more-contact">
        <div class="fh5co-narrow-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-envelope-o"></i>
                        </div>
                        <div class="fh5co-text">
                            <p><a href="#">phonebol@domain.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-map-o"></i>
                        </div>
                        <div class="fh5co-text">
                            <p>Av. America y final Av. Pando IC NORTE .</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="fh5co-text">
                            <p><a href="tel://">+591 XXX XXXXX</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.7244844465004!2d-66.17477958534006!3d-17.37698566849032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e374693534167b%3A0xfb9cfdea38836b6f!2sHipermaxi!5e0!3m2!1sen!2sbo!4v1565704059799!5m2!1sen!2sbo" width="100%" height="650" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    
    <div class="fh5co-more-contact">
        <div class="fh5co-narrow-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-envelope-o"></i>
                        </div>
                        <div class="fh5co-text">
                            <p><a href="#">phonebol@domain.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-map-o"></i>
                        </div>
                        <div class="fh5co-text">
                            <p>Av. Melchor Perez de Holguin y Av. Juan de la rosa HIPERMAXI .</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="fh5co-text">
                            <p><a href="tel://">+591 XXX XXXXX</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
        
        <div class="row">
            <div class="col-md-4">
                <h1>Mandanos Un Mensaje</h1>
            </div>
        </div>
        <form  method="post" action="{{route('contact')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <textarea id="message" cols="30" rows="7" name="mensaje" class="form-control" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-md" value="Enviar Message">
                            </div>
                        </div>
                    
                    </div>
                
                </div>
                
            </div>
        </form>
    </div>
    @endsection