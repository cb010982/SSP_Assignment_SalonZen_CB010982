<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');"
            data-stellar-background-ratio="0.5">
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a class="navbar-brand" href="#home">SALON ZEN</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span> Menu
                    </button>
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Products</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Team</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Appointments</a></li>
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                    data-scrollax-parent="true">
                    <div class="col-md-8 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="icon">
                            <a href="#home" class="logo">
                                <span class="flaticon-flower"></span>
                                <h1>Salon Zen</h1>
                            </a>
                        </div>
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Beauty
                            Salon
                        </h1>
                        <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Where Beauty
                            and Elegance Unite</p>

                        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#"
                                class="btn btn-white btn-outline-white px-4 py-3">View Our Services</a></p>
                    </div>
                </div>
            </div>
        </div>


        <main class="py-4">
            @yield('content')
        </main>

        <footer class="ftco-footer ftco-section img">
            <div class="overlay"></div>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">About Us</h2>
                            <p>At Salon Zen, beauty is not just our business; it's our passion. We're more than just a
                                salon; we're a sanctuary of style, relaxation, and self-care.</p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">New Arrivals</h2>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(images/work-11.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">DreamSkin Night Cream</a></h3>
                                    <div class="meta">
                                        <!--    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(images/product3.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Pure Radiance Vitamin C Boost Serum</a></h3>
                                    <div class="meta">
                                        <!--    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(images/product4.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Ageless Elegance Renewal Cream</a></h3>
                                    <div class="meta">
                                        <!--    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="ftco-footer-widget mb-4 ml-md-4">
                            <h2 class="ftco-heading-2">Most rated</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">Body Care</a></li>
                                <li><a href="#" class="py-2 d-block">Massage</a></li>
                                <li><a href="#" class="py-2 d-block">Hydrotherapy</a></li>
                                <li><a href="#" class="py-2 d-block">Spray tanning</a></li>
                                <li><a href="#" class="py-2 d-block">Microblading</a></li>
                                <li><a href="#" class="py-2 d-block">Scalp treatments</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Have a Questions?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">No 12.
                                            High-level Road, Nugegoda, Sri Lanka</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span
                                                class="text">+94 112 807 979<br>+94 777 605 000</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span
                                                class="text">info@salonzen.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <!--  <p> Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <!-- Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
       Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p> -->
                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | Salon Zen
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none"
                    stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none"
                    stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
            </svg></div>


        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/jquery.timepicker.min.js"></script>
        <script src="js/scrollax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="js/google-map.js"></script>
        <script src="js/main.js"></script>
    </div>
</body>

</html>
