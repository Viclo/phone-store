@extends('auth.login')
@section('menu')
<li class=""><a href="/">PHONEBOL</a></li>
<li class="nav-item dropdown ">
<a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">CATALOGO<i class="icon-arrow-down"></i></a>
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('celular') }}">CELULARES</a>
    <a class="dropdown-item" href="{{ url('tablet') }}">TABLET'S</a>
    <a class="dropdown-item" href="{{ url('laptop') }}">lAPTOP'S</a>
    <a class="dropdown-item" href="{{ url('accesorio') }}">ACCESORIOS</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ url('oferta') }}">EN OFERTA</a>
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
                                <h1 align="center">Samsung Galaxy S9</h1>
                                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                    <figure class="text-center">
                                        <img src="images/work_1.jpg" width="500" height="500"   class="redu">
                                    </figure>
                                </div>
                                
                                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                        <button data-animate-effect="fadeInLeft" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Negociar</button>
                                    </div>
                                    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                        <h3>Precio</h3><p>450$</p>
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
                                                                    <p>5.8 pulgadas</p>
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
                                                                    <p>Cámara trasera: 12 megapixeles con estabilización de imagen óptica y apertura variable de f/1.5 a f/2.4 </p>
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
                                                                    <p>Almacenamiento: 64GB, 128GB y 256GB (varía según el mercado. Por ejemplo, en EE.UU. solo se vende la versión con 64GB) </p>
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
                                                                        <p>Sistema Operativo: Android Oreo</p>
                                                                        <p>Procesador: Snapdragon 845 de ocho núcleos</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="single_feature">
                                                                    <i class="fas fa-signal fa-5x" style="color:#02387c;"></i>
                                                                    <div class="single_feature_part">
                                                                        <img src="img/icon/signal.png" alt="">
                                                                        <h4>Red</h4>
                                                                        <p> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="single_feature">
                                                                    <i class="fas fa-battery-three-quarters fa-5x" style="color:#02387c;"></i>
                                                                    <div class="single_feature_part">
                                                                        <img src="img/icon/battery.png" alt="">
                                                                        <h4>Bateria</h4>
                                                                        <p> </p>
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
                                    <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Telefono</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Celular a Modo de Pago</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Estado</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
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
                                        <label for="recipient-name" class="col-form-label">Telefono que desea</label>
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Galaxy S9">
                                    </div>
                                    <div>
                                        <label>El termino ocasional se refiere a celulares que han entrado como parte de pago, que han sido usados por termino comercial, pero certificados por la empresa. </label>
                                    </div>
                                    <div class="form-group mt-4">
                                            <input class="form-check-input" type="checkbox">
                                            <label  class="white-text form-check-label">Acepta los Terminos y Condiciones.</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary">Enviar</button>
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