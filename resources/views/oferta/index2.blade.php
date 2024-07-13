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
<div class="fh5co-narrow-content">
        
    <div class="contenedora">
        <input type="text" placeholder="Buscar...">
        <div class="search"></div>
    </div>
    
</div>

<div class="fh5co-narrow-content">
        
    <div class="container-fluid bg-light ">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="form-group">
                    <select id="inputState" class="form-control">
                    <option selected>Marca</option>
                    <option>Sony</option>
                    <option>Huawei</option>
                    <option>HTC</option>
                    <option>Apple</option>
                    </select>
                </div>
            </div>        
            <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block">Buscar</button>
            </div>
        </div>
    </div>
</div>
<div class="fh5co-narrow-content">
    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">OCACIONALES</h2>
    <div class="row animate-box" data-animate-effect="fadeInLeft">
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <a href="{{ url('work1') }}">
                <img src="images/work_1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">Galaxy S9</h3>
                <p>Samsung</p>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <a href="work.html">
                <img src="images/work_2.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">Moto G7</h3>
                <p>Motorola</p>
            </a>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <a href="work.html">
                <img src="images/work_3.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">Mate 20</h3>
                <p>Huawei</p>
            </a>
        </div>
        <div class="clearfix visible-md-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <a href="work.html">
                <img src="images/work_4.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">Mate 20 Lite</h3>
                <p>Huawei</p>
            </a>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <a href="work.html">
                <img src="images/work_5.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">iPhone-X</h3>
                <p>Apple</p>
            </a>
        </div>
        
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <a href="work.html">
                <img src="images/work_1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                <h3 class="fh5co-work-title">Work Title Here</h3>
                <p>Illustration, Branding</p>
            </a>
        </div>
        <div class="clearfix visible-md-block"></div>
        
    </div>
</div>


@endsection