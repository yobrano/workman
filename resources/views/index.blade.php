<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets\images\frontend\favicon.ico')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/owl.carousel/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/owl.carousel/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/jquery-flipster/css/jquery.flipster.css') }}" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="0">

    <div id="mobile-menu-overlay"></div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/assets/images/frontend/logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}"></a>
            <button class="navbar-toggler" type="button"data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
                    <img src="{{ asset('/assets/images/frontend/logo.svg') }}" class="logo-mobile-menu" alt="logo">
                    <a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
                </div>
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item active"><a class="nav-link" href="#home">Home <span
                                class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonial">Testimonial</a></li>
                    {{-- <li class="nav-item"><a class="nav-link btn btn-primary" href="#contact">Login</a></li> --}}
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                            <a class="nav-link btn " href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
        {{ __('Dashboard') }}
        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                  </a>
                                
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                  </div> --}}
                            </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

     
    <div class="page-body-wrapper">
        <section id="home" class="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-banner">
                            <div class="bnr-text">
                                <div class="banner-title">
                                    <h5>{{env('APP_NAME')}}</h5>

                                    {{-- <h1 class="font-weight-medium">Home improvement,repair,inspection,<br/>cleaning,improvement,<br/>made easy</h1> --}}
                                </div>
                                <p class="mt-3">Home improvement,repair,inspection,cleaning,improvement,made easy</p>
                                <div class="seach-box" style="z-index: 2;position: relative;">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Service" aria-label="Search Service" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                          <button class="btn btn-info" type="button" id="button-addon2">Search</button>
                                        </div>
                                      </div>
                                </div>
                                {{-- <a href="#" class="btn btn-secondary mt-3">Learn more</a> --}}
                            </div>
                            <div class="bnr-img">
                                <img src="{{asset('assets\images\frontend\loaderimg.svg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-services" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>We’re offering</h5>
                        <h3 class="font-weight-medium mb-5">Creative Digital Agency</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 text-center text-lg-left">
                        <div class="services-box">
                            <img src="assets/images/service-icon/integrated-marketing.svg" alt="integrated-marketing" >
                            <h6 class="mb-3 mt-4 font-weight-medium">Integrated Marketing</h6>
                            <p>Lorem ipsum dolor sit amet, pretium pretium tempor.Lorem ipsum </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center text-lg-left">
                        <div class="services-box">
                            <img src="assets/images/service-icon/design-development.svg" alt="design-development" >
                            <h6 class="mb-3 mt-4 font-weight-medium">Design & Development</h6>
                            <p>Lorem ipsum dolor sit amet, pretium pretium tempor.Lorem ipsum </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center text-lg-left">
                        <div class="services-box">
                            <img src="assets/images/service-icon/digital-strategy.svg" alt="digital-strategy" >
                            <h6 class="mb-3 mt-4 font-weight-medium">Digital Strategy</h6>
                            <p>Lorem ipsum dolor sit amet, pretium pretium tempor.Lorem ipsum </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center text-lg-left">
                        <div class="services-box pb-lg-0" >
                            <img src="assets/images/service-icon/digital-marketing.svg" alt="digital-marketing" >
                            <h6 class="mb-3 mt-4 font-weight-medium">Digital Marketing</h6>
                            <p>Lorem ipsum dolor sit amet, pretium pretium tempor.Lorem ipsum </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center text-lg-left">
                        <div class="services-box pb-lg-0" >
                            <img src="assets/images/service-icon/growth-strategy.svg" alt="growth-strategy" >
                            <h6 class="mb-3 mt-4 font-weight-medium">Growth Strategy</h6>
                            <p>Lorem ipsum dolor sit amet, pretium pretium tempor.Lorem ipsum </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center text-lg-left">
                        <div class="services-box pb-0" >
                            <img src="assets/images/service-icon/saving-strategy.svg" alt="saving-strategy" >
                            <h6 class="mb-3 mt-4 font-weight-medium">Saving Strategy</h6>
                            <p>Lorem ipsum dolor sit amet, pretium pretium tempor.Lorem ipsum </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-process" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <h5 class="text-dark">Our work process</h5>
                        <h3 class="font-weight-medium text-dark">Discover New Idea With Us!</h3>
                        <h5 class="text-dark mb-5">Imagination will take us everywhere</h5>
                        <div class="d-flex justify-content-start mb-3">
                            <img src="assets/images/tick.svg" alt="tick" class="mr-3 tick-icon">
                            <p class="mb-0">It is a long established fact that a reader will be distracted</p>
                        </div>
                        <div class="d-flex justify-content-start mb-3">
                            <img src="assets/images/tick.svg" alt="tick" class="mr-3 tick-icon">
                            <p class="mb-0">There are many variations of passages of Lorem Ipsum</p>
                        </div>
                        <div class="d-flex justify-content-start mb-3">
                            <img src="assets/images/tick.svg" alt="tick" class="mr-3 tick-icon">
                            <p class="mb-0">Contrary to popular belief, Lorem Ipsum</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="assets/images/tick.svg" alt="tick" class="mr-3 tick-icon">
                            <p class="mb-0">Various versions have evolved over the years, sometimes</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 text-right">
                        <img src="assets/images/idea.svg" alt="idea" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="container stat-icon">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 my-3 my-lg-0 justify-content-center" >
                                    <img src="assets/images/stat-icon-1.svg" alt="" class="mr-3">
                                    <div>
                                        <h4 class="font-weight-bold mb-0"><span class="scVal">0</span>%</h4>
                                        <h6 class="mb-0">Satisfied clients</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
                                    <img src="assets/images/stat-icon-2.svg" alt="" class="mr-3">
                                    <div>
                                        <h4 class="font-weight-bold mb-0"><span class="fpVal">0</span></h4>
                                        <h6 class="mb-0">Finished Project</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 my-3 my-lg-0 justify-content-center" >
                                    <img src="assets/images/stat-icon-3.svg" alt="" class="mr-3">
                                    <div>
                                        <h4 class="font-weight-bold mb-0"><span class="tMVal">0</span></h4>
                                        <h6 class="mb-0">Team Members</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
                                    <img src="assets/images/stat-icon-4.svg" alt="" class="mr-3">
                                    <div>
                                        <h4 class="font-weight-bold mb-0"><span class="bPVal">0</span></h4>
                                        <h6 class="mb-0">Our Blog Posts</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-projects" id="projects">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-sm-12">
                        <div class="d-sm-flex justify-content-between align-items-center mb-2">
                            <h3 class="font-weight-medium text-dark ">Let's See Our Latest Project</h3>
                            <div><a href="#" class="btn btn-outline-primary">View more</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="owl-carousel-projects owl-carousel owl-theme">
                    <div class="item"><img src="assets/images/carousel/slider1.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider2.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider3.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider4.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider5.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider1.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider2.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider3.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider4.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider5.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider1.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider2.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider3.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider4.jpg" alt="slider"></div>
                    <div class="item"><img src="assets/images/carousel/slider5.jpg" alt="slider"></div>
                </div>
            </div>
        </section>
        <section class="testimonial" id="testimonial">
            <div class="container">
                <div class="row  mt-md-0 mt-lg-4">
                    <div class="col-sm-6 text-white">
                        <p class="font-weight-bold mb-3">Testimonials</p>
                        <h3 class="font-weight-medium">Our customers are our <br>biggest fans</h3>
                        <ul class="flipster-custom-nav">
                            <li class="flipster-custom-nav-item"><a href="javascript:;" class="flipster-custom-nav-link" title="0"></a></li>
                            <li class="flipster-custom-nav-item"><a href="javascript:;" class="flipster-custom-nav-link"  title="1"></a></li>
                            <li class="flipster-custom-nav-item"><a href="javascript:;" class="flipster-custom-nav-link active" title="2"></a></li>
                            <li class="flipster-custom-nav-item"><a href="javascript:;" class="flipster-custom-nav-link"  title="3"></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div id="testimonial-flipster">
                            <ul>
                                <li>
                                    <div class="testimonial-item">
                                        <img src="assets/images/testimonial/testimonial1.jpg" alt="icon" class="testimonial-icons">
                                        <p>Lorem ipsum dolor sit amet, consectetur pretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium</p>
                                        <h6 class="testimonial-author">Mark Spenser</h6>
                                        <p class="testimonial-destination">Accounts</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-item">
                                        <img src="assets/images/testimonial/testimonial2.jpg" alt="icon" class="testimonial-icons">
                                        <p>Lorem ipsum dolor sit amet, consecteturpretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium</p>
                                        <h6 class="testimonial-author">Tua Manuera</h6>
                                        <p class="testimonial-destination">Director,Dj market</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-item">
                                        <img src="assets/images/testimonial/testimonial3.jpg" alt="icon" class="testimonial-icons">
                                        <p>Lorem ipsum dolor sit amet, consecteturpretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium</p>
                                        <h6 class="testimonial-author">Sarah Philip</h6>
                                        <p class="testimonial-destination">Chief Accountant</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-item">
                                        <img src="assets/images/testimonial/testimonial4.jpg" alt="icon" class="testimonial-icons">
                                        <p>Lorem ipsum dolor sit amet, consecteturpretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium</p>
                                        <h6 class="testimonial-author">Mark Spenser</h6>
                                        <p class="testimonial-destination">Director,Dj market</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pricing-list" id="plans">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-sm-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h3 class="font-weight-medium text-dark ">Checkout Pricing Plan</h3>
                                <h6 class="text-dark ">There are many variations of passages of Lorem Ipsum available, but the majority</h6>
                            </div>
                            <div class="mb-5 mb-lg-0 mt-3 mt-lg-0">
                                <div class="d-flex align-items-center">
                                    <p class="mr-2 font-weight-medium monthly text-active check-box-label">Monthly</p>
                                    <label class="toggle-switch toggle-switch">
                                        <input type="checkbox" checked  id="toggle-switch">
                                        <span class="toggle-slider round"></span>
                                    </label>
                                    <p class="ml-2 font-weight-medium yearly check-box-label">Yearly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="pricing-box">
                            <img src="assets/images/plan-1.svg" alt="">
                            <h6 class="font-weight-medium title-text">Freelance</h6>
                            <h1 class="text-amount mb-4 mt-2">$99</h1>
                            <ul class="pricing-list">
                                <li>-- Create a free website --</li>
                                <li>-- Connect Domain --</li>
                                <li>-- Business and ecommerce --</li>
                                <li>-- Idea for smaller professional websites --</li>
                                <li>-- Web space --</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary">Puchase Now</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="pricing-box selected">
                            <img src="assets/images/plan-2.svg" alt="">
                            <h6 class="font-weight-medium title-text">Business</h6>
                            <h1 class="text-amount mb-4 mt-2">$199</h1>
                            <ul class="pricing-list">
                                <li>-- Create a free website --</li>
                                <li>-- Connect Domain --</li>
                                <li>-- Business and ecommerce --</li>
                                <li>-- Idea for smaller professional websites --</li>
                                <li>-- Web space --</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Puchase Now</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="pricing-box">
                            <img src="assets/images/plan-3.svg" alt="">
                            <h6 class="font-weight-medium title-text">Enterprise</h6>
                            <h1 class="text-amount mb-4 mt-2">$299</h1>
                            <ul class="pricing-list">
                                <li>-- Create a free website --</li>
                                <li>-- Connect Domain --</li>
                                <li>-- Business and ecommerce --</li>
                                <li>-- Idea for smaller professional websites --</li>
                                <li>-- Web space --</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary">Puchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clients">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <img src="assets/images/client-logo/deloit.svg" alt="deloit" class="p-2 p-lg-0">
                            <img src="assets/images/client-logo/erricson.svg" alt="erricson" class="p-2 p-lg-0">
                            <img src="assets/images/client-logo/netflix.svg" alt="netflix" class="p-2 p-lg-0">
                            <img src="assets/images/client-logo/instagram.svg" alt="instagram" class="p-2 p-lg-0">
                            <img src="assets/images/client-logo/coinbase.svg" alt="coinbase" class="p-2 p-lg-0">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contactus" id="contact">
            <div class="container">
                <div class="row mb-5 pb-5">
                    <div class="col-sm-5" >
                        <img src="assets/images/contact.svg" alt="contact" class="img-fluid">
                    </div>
                    <div class="col-sm-7" >
                        <h3 class="font-weight-medium mt-5 mt-lg-0">Got A Problem</h3>
                        <h6 class="mb-5">Various versions have evolved over the years, sometimes</h6>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="mail" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" placeholder="Message*" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <a href="#" class="btn btn-secondary">SEND</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- main footer section --> 
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <p>70 Bowman St. South Windsor,</p>
                            <p class="mb-4">CT 06074</p>
                            <div class="d-flex align-items-center">
                                <p class="mr-4 mb-0">+3 123 456 789</p>
                                <a href="#" class="footer-link">info@yourmail.com</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mr-4 mb-0">+1 222 345 342</p>
                                <a href="#" class="footer-link">rose-coke@example.com</a>
                            </div>
                        </address>
                        <div class="social-icons">
                            <h6 class="footer-title font-weight-bold">Social Share</h6>
                            <div class="d-flex">
                                <a href="#"><i class="mdi mdi-github-circle"></i></a>
                                <a href="#"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="#"><i class="mdi mdi-twitter"></i></a>
                                <a href="#"><i class="mdi mdi-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="footer-title">Social Share</h6>
                                <ul class="list-footer">
                                    <li><a href="#" class="footer-link">Home</a></li>
                                    <li><a href="#" class="footer-link">About</a></li>
                                    <li><a href="#" class="footer-link">Services</a></li>
                                    <li><a href="#" class="footer-link">Portfolio</a></li>
                                    <li><a href="#" class="footer-link">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="footer-title">Services</h6>
                                <ul class="list-footer">
                                    <li><a href="#" class="footer-link">UI/UX Design</a></li>
                                    <li><a href="#" class="footer-link">Web Development</a></li>
                                    <li><a href="#" class="footer-link">App Development</a></li>
                                    <li><a href="#" class="footer-link">Digital Marketing</a></li>
                                    <li><a href="#" class="footer-link">API Development</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="footer-title">Company</h6>
                                <ul class="list-footer">
                                    <li><a href="#" class="footer-link">Advertise</a></li>
                                    <li><a href="#" class="footer-link">Confidentiality</a></li>
                                    <li><a href="#" class="footer-link">Our Work</a></li>
                                    <li><a href="#" class="footer-link">Help Center</a></li>
                                    <li><a href="#" class="footer-link">Our Facts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 text-small pt-1">© 2019-2020 <a href="https://www.puffintheme.com" class="text-white" target="_blank">puffintheme</a>. All rights reserved.</p>
                    </div>
                    <div>
                        <div class="d-flex">
                            <a href="#" class="text-small text-white mx-2 footer-link">Privacy Policy </a>          
                            <a href="#" class="text-small text-white mx-2 footer-link">Customer Support </a>
                            <a href="#" class="text-small text-white mx-2 footer-link">Careers </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- animation line --> 
    <div class="animate_lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>


    {{-- Scripts --}}
    <script src="{{ asset('/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/vendors/owl.carousel/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('/vendors/jquery-flipster/js/jquery.flipster.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}

    {{-- @yield('script') --}}
</body>

</html>
