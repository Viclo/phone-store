<!doctype html>

<html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Phonebol</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
        <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
        <meta name="author" content="FreeHTML5.co" />
    
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />
    
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    
        <link rel="shortcut icon" href="{{asset ('images/logo.png')}}">
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <!-- Theme style  -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Modernizr JS -->
        <script src="{{URL::asset('js/modernizr-2.6.2.min.js')}}"></script>
    
        </head>
        
<body>
<div id="overlayer"></div>
<span class="loader">
    <span class="loader-inner"></span>
</span>


    <div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

    <h1 id="fh5co-logo"><a href="index.html"><img src="{{asset ('images/logo.png')}}" ></a></h1>
    <nav id="fh5co-main-menu" role="navigation">
        <ul>
            @yield('menu')
            @if (Route::has('login'))
                     @auth
                        <li class="fh5co-active"><a href="{{ url('/main') }}">Home</a></li>
                    @else
                        <li><a href="" data-toggle="modal" data-target="#popUpWindow">login</a></li>
                    @endauth

            @endif
        </ul>
    </nav>
    
    <div class="fh5co-footer">
            <p><small>&copy; 2018 Todos los derechos reservados Phonebol.</span></small></p>
            <ul>
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-instagram"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
            </ul>
        </div>

</aside>
    
    <div id="fh5co-main">
            @yield('banner')
        <div class="container">
                <div class="modal fade" id="popUpWindow">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <!-- header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Ingresar</h3>
                            </div>
                            <!-- body -->
                            <div class="modal-header">
                    
                                <form  method="POST" action="{{ route('login')}}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                <div class="form-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                                    {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
                                </div>
                                <div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                </div>
                                </form>
                            </div>
                            <!-- footer -->
                            
                            
                            </div>
                        </div>
                    </div>
            @yield('contenido')
        </div>
	</div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{URL::asset('js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
	<!-- Stellar -->
	<script src="{{URL::asset('js/jquery.stellar.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{URL::asset('js/jquery.waypoints.min.js')}}"></script>
	<!-- Counters -->
	<script src="{{URL::asset('js/jquery.countTo.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    

	<!-- MAIN JS -->
    <script src="{{URL::asset('js/main.js')}}"></script>
    <!--<script src="{{URL::asset('js/extention/choices.js')}}"></script>-->
</body>
</html>