<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Dec 2020 00:32:53 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('adminAssets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ asset('adminAssets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('adminAssets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('adminAssets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminAssets/css/dark-sidcebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminAssets/css/dark-theme.css') }}" />
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="{{ asset('adminAssets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
                </div>
                <div>
                    <h4 class="logo-text">Coffee</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="/">
                        <div class="parent-icon icon-color-3"><i class="bx bx-globe-alt"></i>
                        </div>
                        <div class="menu-title">Main Website</div>
                    </a>
                </li>
                <li>
                    <a href="/admin">
                        <div class="parent-icon icon-color-2"><i class="bx bx-home-alt"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/products">
                        <div class="parent-icon icon-color-4"><i class="bx bx-coffee"></i>
                        </div>
                        <div class="menu-title">Produk</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/penjualan">
                        <div class="parent-icon icon-color-1"><i class="bx bx-money"></i>
                        </div>
                        <div class="menu-title">Penjualan</div>
                    </a>
                </li>
                <li>
                    <a href="/feedbacks">
                        <div class="parent-icon icon-color-5"><i class="bx bx-comment-dots"></i>
                        </div>
                        <div class="menu-title">Feedback</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->
        @yield('content')
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">Coffeed @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                    target="_blank">codervent</a>
            </p>
        </div>
        <!-- end footer -->
    </div>
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/js/plugins/17d4bef7b0.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('adminAssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/bootstrap.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('adminAssets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/vectormap/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/index2.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('adminAssets/js/app.js') }}"></script>
</body>


<!-- Mirrored from codervent.com/syndash/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Dec 2020 00:32:53 GMT -->

</html>
