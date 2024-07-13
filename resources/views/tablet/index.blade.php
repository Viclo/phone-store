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
<form  method="get" action="/buscarTab" enctype="multipart/form-data">
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
    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">TABLET'S</h2>
    <div class="row animate-box" data-animate-effect="fadeInLeft">
        
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            @foreach($telefonos as $telefono)
           
            <a href="/tabletas/{{$telefono->id}}">
            <img src="{{$telefono->imagen}}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">{{$telefono->nombre}}</h3>
                <p>Nuevo</p>
            </a>

            @endforeach
    </div>
        
        
    </div>
</div>


@endsection