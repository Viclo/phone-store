<!doctype html>

<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phonebol</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand main_logo" href="index.html"> <img src="img/logo.png" alt="logo"> </a>
                        <a class="navbar-brand single_page_logo" href="index.html"> <img src="img/footer_logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="features.html">Que nos hace especiales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pricing.html">Precios</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Catalogo
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('telefonos') }}"> Celulares</a>
                                        <a class="dropdown-item" href="blog.html"> Tablets</a>
                                        <a class="dropdown-item" href="blog.html"> Accesorios</a>
                                        <a class="dropdown-item" href="single-blog.html">En Oferta</a>
                                        <a class="dropdown-item" href="single-blog.html">Laptops</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('contacto') }}">Contacto</a>
                                </li>
                            </ul>
                        </div>
                        <!--<a href="#" class="d-none d-sm-block btn_1 home_page_btn">sing up</a>-->
                        @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/main') }}">Home</a>
                                @else
                                    <a href="" class="d-none d-sm-block btn_1 home_page_btn" data-toggle="modal" data-target="#popUpWindow">login</a>
                                @endauth

                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--::Header part end::-->
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
            <div class="modal-body">

                <form  method="POST" action="{{ route('login')}}">
                    {{ csrf_field() }}
                <div class="form-group">
                <div class="form-group mb-4{{$errors->has('usuario' ? 'is-invalid' : '')}}">
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
                    <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                </div>
                </form>
            </div>
            <!-- footer -->
            
            
            </div>
        </div>
        </div>

        </div>          
    <!--::banner part start::-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="banner_img d-none d-lg-block">
                        <img src="img/banner_img.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Bienvenido</h1>
                            <p>Aqui puedes ver nuestro catalago de celulares y accesorios junto con otros articulos que podrian ser de tu interes.</p>
                            <a href="#" class="btn_2">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="img/animate_icon/Ellipse_7.png" alt="" class="feature_icon_1 custom-animation1">
        <img src="img/animate_icon/Ellipse_8.png" alt="" class="feature_icon_2 custom-animation2">
        <img src="img/animate_icon/Ellipse_1.png" alt="" class="feature_icon_3 custom-animation3">
        <img src="img/animate_icon/Ellipse_2.png" alt="" class="feature_icon_4 custom-animation4">
        <img src="img/animate_icon/Ellipse_3.png" alt="" class="feature_icon_5 custom-animation5">
        <img src="img/animate_icon/Ellipse_4.png" alt="" class="feature_icon_6 custom-animation6">
    </section>
    <!--::banner part start::-->

    <!--::use sasu part end::-->
    <section class="use_sasu padding_top">
        <div class="container">
            <div class="row justify-content-center">
                    
                    <div class="fh5co-narrow-content">
                            <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">NOVEDADES</h2>
                            <div class="row animate-box" data-animate-effect="fadeInLeft">
                                <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
                                    <a href="{{ url('work') }}">
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
                        <div class="fh5co-narrow-content">
                            <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">ESPECIALES</h2>
                            <div class="row animate-box" data-animate-effect="fadeInLeft">
                                <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
                                    <a href="work.html">
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
                            </div>
                        </div>
                       
            </div>
        </div>
        <img src="img/animate_icon/Ellipse_1.png" alt="" class="feature_icon_1 custom-animation1">
    </section>
    <!--::use sasu part end::-->

    <!--::about_us part end::-->

    <!--::about_us part end::-->

    <!--::pricing part end::-->

    <!--::about_us part end::-->

    <!--::subscribe us part end::-->

 
    <!--::client logo part end::-->

    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>