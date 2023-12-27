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
<link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-OSnT1q1I9e0lJ0dz3YB7jz1d7z6Zjk5qfJFkirk1CJz3EHG/JmI7vCkqFzBgfiv5U4C/p0zkgqFgBXRHBB5xwQ=="
        crossorigin=""
    />

<style>

a i {
    margin-right: 5px;
}
</style>
</head>
<body>
   
                 <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-dark py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">             
                    <a class="text-white px-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white px-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="text-white px-3" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-white px-3" href=""><i class="fab fa-instagram"></i></a>
                    <a class="text-white pl-3" href=""><i class="fab fa-youtube"></i></a>
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
                                <a id="navbarDropdown" class="text-white pl-3" href=" {{route('dashboard')}}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{-- route('home') --}}
                                </a> 
                                <span class="text-white">&nbsp;&nbsp;&nbsp;|</span>                               
                                    <a class="text-white pl-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                                    
                         @endguest                      
                </div>
            </div>
        </div>

        <div class="row"><!-- py-3 px-lg-5"-->
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Evets</span>.Pet</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">                     
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">         
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



                        @guest
                            @if (Route::has('login'))
                        <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>                       
                               <div class="dropdown-menu rounded-0 m-0">
                               <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                               <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                              </div>
                        </div>  
                            @endif
                         @else
                         <div class="nav-item dropdown">
                           <a href="{{ route('home') }}"  class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} </a> 
                               <div class="dropdown-menu rounded-0 m-0">
                                @auth
                            @if(auth()->user()->id == 1)                        
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>                              
                            @endif
                                @endauth
                                 <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                 <a class="dropdown-item" href="{{ route('mypets.index') }}">My Pets</a>
                        
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                              </div>
                        </div>  
                         @endguest       



                    <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                    <a href="/petfinder" class="nav-item nav-link">Find A Pet</a>
                    <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                    <a href="{{ route('price') }}" class="nav-item nav-link">Price</a>
                    <a href="{{ route('booking') }}" class="nav-item nav-link">Booking</a>
                    <a href="/articles" class="nav-item nav-link">Articles</a>                       
                    <a href="{{ route('home') }}" class="nav-item nav-link">Contact</a>
{{--{{ route('blog') }}
                          <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>                       
                               <div class="dropdown-menu rounded-0 m-0">
                               <a href="{{ route('blog') }}" class="dropdown-item">Blog Grid</a>
                               <a href="{{ route('blog') }}" class="dropdown-item">Blog Detail</a>
                              </div>
                        </div>
--}}
                </div>
              {{--    <a href="" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Get Quote</a> --}}
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

 <div id="app">
        <main> <!-- class="py-4" -->
            @yield('content')
        </main>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Evets</span>.Pet</h1>
                <p class="m-0">A comprehensive pet care platform, where a wealth of veterinary and grooming information awaits every pet enthusiast. Our site is dedicated to providing a holistic approach to pet well-being, offering valuable insights from seasoned veterinarians and grooming experts.
                    {{-- 
                    
Welcome to our comprehensive pet care platform, where a wealth of veterinary and grooming information awaits every pet enthusiast. Our site is dedicated to providing a holistic approach to pet well-being, offering valuable insights from seasoned veterinarians and grooming experts.

Explore a treasure trove of veterinary resources that cover a spectrum of topics, from preventive care to specialized treatments. Stay informed about your furry friends' health with in-depth articles, expert tips, and the latest trends in pet healthcare.

Create a personalized haven for your pets by establishing their unique profiles. Our user-friendly platform allows you to curate essential details about your pets, ensuring a tailored experience that caters to their individual needs. From medical histories to dietary preferences, your pet's profile becomes a central hub for managing their well-being.

Delve into grooming information that transforms your pet care routine into a pampering session. Discover grooming tips and tricks, product recommendations, and step-by-step guides to keep your pets looking and feeling their best.

Join us on a journey dedicated to the happiness and health of your pets. Uncover the secrets to a thriving pet lifestyle with our veterinary insights, grooming expertise, and the ability to craft personalized pet profiles. Your pets deserve the best, and we're here to guide you every step of the way.
--}}
                </p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Hollywood,FL 33020</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>(954)391-**98</p>
                        <p><i class="fa fa-envelope mr-2"></i>Dr.Steve@steven.news</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Team</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                     

                       {{-- 
                        <h5 class="text-primary mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit Now</button>
                            </div>
                        </form>
                        --}}


                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Evets.Pet</a>. All Rights Reserved. 
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->
















</div>    


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- Template Javascript -->
    <script src="/js/main.js"></script>


</body>
</html>
