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
                                        <img src="{{ url( $telefono->imagen) }}" width="500" height="500"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="{{ url( $telefono->imagen2) }}" width="200" height="200"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="{{ url( $telefono->imagen3) }}" width="200" height="200"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="{{ url( $telefono->imagen4) }}" width="200" height="200"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="{{ url( $telefono->imagen5) }}" width="200" height="200"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="{{ url( $telefono->imagen6) }}" width="200" height="200"   class="redu">
                                    </figure>
                                </div>
                                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                        <button data-animate-effect="fadeInLeft" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Negociar</button>
                                    </div>
                                    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                        <button data-animate-effect="fadeInLeft" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@fat">Comprar</button>
                                    </div>
                                    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                        <h3>Precio</h3><p>{{$telefono->precio}} $</p>
                                    </div>
                                <div class="col-md-12  animate-box" data-animate-effect="fadeInLeft">
                                        <section class="use_sasu padding_top">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="single_feature">
                                                                <i class="fas fa-arrows-alt fa-5x " style="color:#02387c;"></i>
                                                                <div class="single_feature_part">
                                                                    
                                                                    <img src="img/icon/pantalla.png" alt="" width="50" height="50">
                                                                    <h4>Pantalla</h4>
                                                                    <p>{{$telefono->pantalla}}</p>
                                                                    <p>Tamaño: 147.7x68.7x8.5mm</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="single_feature">
                                                                <i class="fas fa-camera fa-5x" style="color:#02387c;"></i>
                                                                <div class="single_feature_part">
                                                                    <img src="img/icon/camera.png" alt="">
                                                                    <h4>Camara</h4>
                                                                    <p>Cámara trasera: {{$telefono->camara}} </p>
                                                                    <p>Cámara frontal: 8 megapixeles con apertura f/1.7</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="single_feature">
                                                                    <i class="fas fa-hdd fa-5x" style="color:#02387c;"></i>
                                                                <div class="single_feature_part ">
                                                                    <img src="img/icon/memory.png" alt="">
                                                                    <h4>Memoria</h4>
                                                                    <p>Almacenamiento: {{$telefono->memoria}} </p>
                                                                    <p>RAM: 4GB</p>
                                                                    <p>Ranura microSD: Sí (certificada hasta 400GB)</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="single_feature">
                                                                    <i class="fab fa-android fa-5x" style="color:#02387c;"></i>
                                                                    <div class="single_feature_part">
                                                                        <img src="img/icon/android.png" alt="" width="50" height="50">
                                                                        <h4>Sistema Android</h4>
                                                                        <p>Sistema Operativo: {{$telefono->sistema}}</p>
                                                                        <p>Procesador: {{$telefono->procesador}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="single_feature">
                                                                    <i class="fas fa-signal fa-5x" style="color:#02387c;"></i>
                                                                    <div class="single_feature_part">
                                                                        <img src="img/icon/signal.png" alt="">
                                                                        <h4>Red</h4>
                                                                        <p>4g LTE</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="single_feature">
                                                                    <i class="fas fa-battery-three-quarters fa-5x" style="color:#02387c;"></i>
                                                                    <div class="single_feature_part">
                                                                        <img src="img/icon/battery.png" alt="">
                                                                        <h4>Bateria</h4>
                                                                        <p>{{$telefono->bateria}} </p>
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
            
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">NEGOCIAR</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="{{route('negociar',$telefono->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                                <label for="">Nombre Completo</label>
                                                <input type="text" name="nombreCliente" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="">Correo Electronico</label>
                                                <input type="text" name="correo" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="">Telefono Celular de referencia</label>
                                                <input type="text" name="telefonoCliente" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="">Marca del telefono</label>
                                                <input type="text" name="marca" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="">modelo del telefono a negociar(*)</label>
                                                <input type="text" name="nombreTel" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="">Color</label>
                                                <input type="color" name="color" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="">Descripcion total del celular(Incluye Accesorios?)</label>
                                                <input type="text" name="descripcion" class="form-control">
                                        </div> 
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Estado</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="condicion">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleFormControlFile1">Cargar Imagen de Celular "si o si debe cargarse cualquier imagen"</label>
                                            <input type="file" required class="form-control-file" id="exampleFormControlFile1" name="imagen">
                                    </div>
                                    <div class="form-group">
                                            <label for="">Por Este</label>
                                            <p>{{$telefono->nombre}}</p>
                                    </div>
                                    <div>
                                        <label>El termino ocasional se refiere a celulares que han entrado como parte de pago, que han sido usados por termino comercial, pero certificados por la empresa. </label>
                                    </div>
                                    <div class="form-group mt-4">
                                            <input class="form-check-input" type="checkbox">
                                            <label  class="white-text form-check-label">Acepta los Terminos y Condiciones.</label>
                                        </div>      
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">COMPRAR</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="{{route('negociar',$telefono->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                                <label for="">Nombre Completo</label>
                                                <input type="text" name="nombreCliente" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="">Correo Electronico</label>
                                                <input type="text" name="correo" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="">Telefono Celular de referencia</label>
                                                <input type="text" name="telefonoCliente" class="form-control">
                                        </div>
                                    <div class="form-group">
                                            <label for="">Este</label>
                                            <p>{{$telefono->nombre}}</p>
                                    </div>
                                    <div>
                                        <label>El termino ocasional se refiere a celulares que han entrado como parte de pago, que han sido usados por termino comercial, pero certificados por la empresa. </label>
                                    </div>
                                    <div class="form-group mt-4">
                                            <input class="form-check-input" type="checkbox">
                                            <label  class="white-text form-check-label">Acepta los Terminos y Condiciones.</label>
                                        </div>      
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                            </div>
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