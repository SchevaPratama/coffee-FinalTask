<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>

    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Coffeez Style sheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon.ico') }}">

</head>

<body>

    <!-- Prealoder start -->
    <div class="andro_preloader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!-- Prealoader End -->

    {{-- Aside mobile navbar --}}
    <aside class="andro_aside andro_aside-left">
      <a href="/" class="navbar-brand">
        <h2>Coffeez</h2>
      </a>
        {{-- <a class="navbar-brand" href="/"> <img src="{{ asset('assets/img/logo.png') }}" alt="logo"> </a> --}}

        <ul class="navbar-nav">
            <li class="menu-item menu-item-has-children">
                <a href="/">Home Pages</a>
            </li>
            <li class="menu-item menu-item-has-children">
                <a href="/aboutus">About Us</a>
            </li>
            <li class="menu-item"> <a href="/contactus">Contact Us</a> </li>
        </ul>

    </aside>
    <div class="andro_aside-overlay aside-trigger-left"></div>

    <!-- Header Start -->
    <header class="andro_header header-3 can-sticky">

        <!-- Topheader Start -->
        <div class="andro_header-top">
            <div class="container">
                <div class="andro_header-top-inner">
                    <ul class="andro_header-top-sm andro_sm">
                        <li> <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                        <li> <a href="https://www.instagram.com/" target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
                        <li> <a href="https://www.twitter.com/" target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Topheader End -->

        <!-- Middle Header Start -->
        <div class="andro_header-middle">
            <div class="container">
                <nav class="navbar">
                    <!-- Logo -->
                    <a href="/" class="navbar-brand">
                      <h2>Coffeed</h2>
                    </a>
                    {{-- <a class="navbar-brand" href="/"> <img src="{{ asset('assets/img/logo.png') }}" alt="logo"> </a> --}}

                    <!-- Menu -->
                    <ul class="navbar-nav">
                        <li class="menu-item menu-item-has-children">
                            <a href="/">Home Pages</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="/aboutus">About Us</a>
                        </li>
                        <li class="menu-item"> <a href="/contactus">Contact Us</a> </li>
                    </ul>

                    <div class="andro_header-controls">

                        <div class="andro_search-adv-input">
                          <form action="/products/search" method="GET" >
                            <input type="text" class="form-control" placeholder="Look for Mocha, Robusta Roasted" name="search" value="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                          </form>
                          </div>

                        <!-- Toggler -->
                        <div class="aside-toggler aside-trigger-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <!-- Middle Header End -->

        <!-- Bottom Header Start -->
        {{-- <div class="andro_header-bottom">
            <div class="container">

                <div class="andro_header-bottom-inner">

                    <!-- Menu -->
                    <ul class="navbar-nav">
                        <li class="menu-item menu-item-has-children">
                            <a href="/">Home Pages</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="/aboutus">About Us</a>
                        </li>
                        <li class="menu-item"> <a href="/contactus">Contact Us</a> </li>
                    </ul>

                </div>

            </div>
        </div> --}}
        <!-- Bottom Header End -->
    </header>
    <!-- Header End -->


    @yield('content');


    <!-- Footer Start -->
    <footer class="andro_footer andro_footer-dark">
        <!-- Top Footer -->
        <div class="container">
          <div class="andro_footer-top">
            <div class="andro_footer-logo">
              <img src="{{ asset('assets/img/clients/6.png') }}" alt="logo">
            </div>
          </div>
        </div>
    
        <!-- Middle Footer -->
        <div class="andro_footer-middle">
          <div class="container">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                <h5 class="widget-title">Information</h5>
                <ul>
                  <li> <a href="/">Home</a> </li>
                  <li> <a href="/aboutus">About Us</a> </li>
                  <li> <a href="/contactus">Contact Us</a> </li>
                </ul>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-widget">
                <h5 class="widget-title">Social Media</h5>
                <ul class="social-media">
                  <li> <a href="https://www.facebook.com/" target="_blank" class="facebook"> <i class="fab fa-facebook-f"></i> </a> </li>
                  <li> <a href="https://www.instagram.com/" target="_blank" class="instagram"> <i class="fab fa-instagram"></i> </a> </li>
                  <li> <a href="https://www.twitter.com/" target="_blank" class="twitter"> <i class="fab fa-twitter"></i> </a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Footer Bottom -->
        <div class="andro_footer-bottom">
          <div class="container">
            <div class="andro_footer-copyright">
              <p> Copyright © 2020 <a href="#">SchevaPratama</a> All Rights Reserved. </p>
              <a href="#" class="andro_back-to-top">Back to top <i class="fas fa-chevron-up"></i> </a>
            </div>
          </div>
        </div>
    
      </footer>
    <!-- Footer End -->


    <!-- Vendor Scripts -->
    <script src="{{asset('assets/js/plugins/17d4bef7b0.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/plugins/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/waypoint.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.slimScroll.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/imagesloaded.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.zoom.min.js')}}"></script>


    <!-- Coffeez Scripts -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
