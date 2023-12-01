<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



<!-- Add this to your layout file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Flaticon Font -->
    <link href="/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">

<!-- Add this to your layout file -->
<script src="/js/jquery-3.6.0.min.js"></script>

<!-- Add this to your layout file -->
<meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
   
                 <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-dark py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
               

 <a class="text-white px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>

                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                   
                     @guest
                            @if (Route::has('login'))
                    <a class="text-white px-3" href="{{ route('login') }}">Login</a>
                            
                    <span class="text-white">|</span>
                           
                    <a class="text-white pl-3" href="{{ route('register') }}">Register</a>
                             @endif
                             @else
                         
                                <a id="navbarDropdown" class="text-white pl-3" href="{{ route('home') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                </a> 

                                <span class="text-white">&nbsp;&nbsp;&nbsp;|</span>                               
                                    <a class="text-white pl-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
           <span class="text-white">&nbsp;&nbsp;&nbsp;|</span> 
                 <a class="text-white px-3" href="{{ route('dashboard') }}">Dashboard</a>
                     <span class="text-white">&nbsp;&nbsp;&nbsp;|</span> 
                                    <a class="text-white px-3" href="{{ route('mypets.index') }}">My Pets</a>                                 
                              
                         @endguest                      
                </div>
            </div>
        </div>
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Evets</span>.Pet</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                       <!-- <h6>Opening Hours</h6>
                        <p class="m-0">8.00AM - 9.00PM</p> -->
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
<!--                        <h6>Email Us</h6>
                        <p class="m-0">info@evets.pet</p> -->
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
          <!--              <h6>Call Us</h6>
                        <p class="m-0">+012 345 6789</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Evets</span>.Pet</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                    <a href="{{ route('price') }}" class="nav-item nav-link">Price</a>
                    <a href="{{ route('booking') }}" class="nav-item nav-link">Booking</a>
 {{--                    <div class="nav-item dropdown">
                       <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">--}}
                       <a href="{{ route('blog') }}" class="nav-item nav-link"> Pages</a>
                       {{-- 
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ route('blog') }}" class="dropdown-item">Blog Grid</a>
                            <a href="{{ route('blog') }}" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>--}}
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                </div>
              {{--   <a href="" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Get Quote</a> --}}
            </div>
        </nav>
    </div>
    <!-- Navbar End -->




 <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
