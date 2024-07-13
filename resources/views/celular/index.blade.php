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
<li><a href="{{ url('contacto') }}">Precios</a></li>
<li><a href="{{ url('contacto') }}">Contactanos</a></li>
@endsection

@section('contenido')
<form  method="get" action="/buscar" enctype="multipart/form-data">
    {{ csrf_field() }}
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
<div class="fh5co-narrow-content">
    <div class="contenedora">
        <input type="text" placeholder="Buscar..." name="busca">
        <div class="search"></div>
    </div>
    
</div>
<div class="fh5co-narrow-content">
        
        <div class="container-fluid bg-light ">
            <div class="row align-items-center justify-content-center">
                <!--<div class="col-md-4 pt-4">
                    <div class="form-group ">
                        <select id="inputState " class="form-control">
                        <option selected>Gama</option>
                        <option>Gama Baja</option>
                        <option>Gama Media Baja</option>
                        <option>Gama Media Alta</option>
                        <option>Gama Alta</option>
                        </select>
                    </div>
                </div>-->
                <div class="col-md-4 pt-4">
                    <div class="form-group">
                        <select class="form-control" name="mari">
                        <option value="">Marca</option>
                        @foreach($marcas as $mar)
                                <option value="{{ $mar->id }}">{{$mar['nombre']}}</option>   
                        @endforeach
                        </select>
                    </div>
                </div>        
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="fh5co-narrow-content">
<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
    <button data-animate-effect="fadeInLeft" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@fat">Vender Telefono</button>
</div>
</div>
<div class="fh5co-narrow-content">
         
        <div class="row animate-box" data-animate-effect="fadeInLeft">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">NOVEDADES</h2>
        <div class="row animate-box" data-animate-effect="fadeInLeft">
                @foreach($telefonos as $telefono)
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
                    
                   
                <a href="/celular/{{$telefono->id}}">
                    <img src="{{$telefono->imagen}}" alt="Free HTML5 Website Template by FreeHTML5.co"  width="300" height="300">
                        <h3 class="fh5co-work-title">{{$telefono->nombre}}</h3>
                        <p>{{$telefono->nombre_marca}}</p>
                    </a>
                    
                   
            </div>
           
            @endforeach
            
            
        </div>
    </div>
</div>   
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post" action="/negociar" enctype="multipart/form-data">
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
                            <label for="">modelo del telefono a Vender(*)</label>
                            <input type="text" name="nombreTel" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="">Color</label>
                            <input type="color" name="color" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="">Descripcion total del Telefono(Incluye Accesorios?)</label>
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
                <!--<div>
                    <label>El termino ocasional se refiere a celulares que han entrado como parte de pago, que han sido usados por termino comercial, pero certificados por la empresa. </label>
                </div>-->
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
@endsection