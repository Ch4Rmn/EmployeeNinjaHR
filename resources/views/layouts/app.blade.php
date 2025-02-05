<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> --}}
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet" />

    {{--  --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css">
    {{--  --}}
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.1/css/buttons.dataTables.css">

    {{-- https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js --}}
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    {{-- <style>

    </style> --}}
    @yield('customCss')
</head>

<body>
    {{--  --}}

    <!-- page-content" -->
    <div class="page-wrapper chiller-theme">
        {{-- <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a> --}}

        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="{{ route('home') }}">
                        HR mangement
                    </a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="{{ asset('images/logo.png') }}" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon
                            <strong>Smith</strong>
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-warning">New</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Dashboard 1
                                            <span class="badge badge-pill badge-success">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 3</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>E-commerce</span>
                                <span class="badge badge-pill badge-danger">3</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Products

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Orders</a>
                                    </li>
                                    <li>
                                        <a href="#">Credit cart</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-gem"></i>
                                <span>Components</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">General</a>
                                    </li>
                                    <li>
                                        <a href="#">Panels</a>
                                    </li>
                                    <li>
                                        <a href="#">Tables</a>
                                    </li>
                                    <li>
                                        <a href="#">Icons</a>
                                    </li>
                                    <li>
                                        <a href="#">Forms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Pie chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Line chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Bar chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Histogram</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Maps</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Google maps</a>
                                    </li>
                                    <li>
                                        <a href="#">Open street map</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            {{-- <a href="{{route('home')}}" onclick="event.preventDefault();"> --}}
                            <a href="{{ route('employee.index') }}">
                                <i class="fa fa-book"></i>
                                <span>Employee</span>
                                <span class="badge badge-pill badge-primary">Beta</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->


        {{--  --}}
        <div id="app " class="bodyy">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" {{-- w-100 " style="position: fixed" --}}>
                <!-- Container wrapper -->

                <div class="" style="">
                    <a style="position: fixed; z-index:1" id="show-sidebar" class="btn btn-sm btn-dark"
                        href="{{ route('home') }}" {{-- onclick="event.preventDefault();" --}}>
                        <i class="fas fa-bars "></i>
                    </a>
                </div>
                <div class="container-fluid mx-5 p-2">
                    <!-- Toggle button -->
                    <button data-mdb-collapse-init class="navbar-toggler" type="button"
                        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <!-- Navbar brand -->
                        <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}" {{-- onclick="event.preventDefault();" --}}>
                            <img src="{{ asset('images/logo.png') }}" height="37" width="43" alt="MDB Logo"
                                loading="lazy" />
                        </a>
                        <h5 class="text-center"> @yield('title')</h5>
                        <!-- Left links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end w-100">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('employee.index') }}">
                                    Employee
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Projects</a>
                            </li>
                        </ul>
                        <!-- Left links -->
                    </div>
                    <!-- Collapsible wrapper -->

                    <!-- Right elements -->
                    <div class="d-flex align-items-center ms-3">
                        <!-- Icon -->
                        <a class="text-reset me-3" href="#">
                            <i class="fas fa-shopping-cart"></i>
                        </a>

                        <!-- Notifications -->
                        <div class="dropdown">
                            <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow"
                                href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">Some news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Avatar -->
                        <div class="dropdown">
                            <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow"
                                href="{{ route('home') }}" id="navbarDropdownMenuAvatar" role="button"
                                aria-expanded="false">
                                <img src="{{ asset('images/logo.png') }}" class="rounded-circle" height="27"
                                    width="30" class="ms-5" alt="Black and White Portrait of a Man"
                                    loading="lazy" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            {{--  --}}

                            {{--  --}}
                        </div>
                    </div>
                    <!-- Right elements -->
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->

            {{--  --}}
            {{-- content --}}
            <div class="">
                <div class="app-bar">
                </div>
                <div class="py-4 content">

                    @yield('content')

                </div>
                <div class="btn-bar"></div>
            </div>

        </div>

        {{-- footer start --}}
        <div class="footer">
            <div class="bottom-menu">
                <div class="d-flex justify-content-around mx-3">

                    <a href="{{ route('home') }}" onclick="event.preventDefault();"
                        class="text-center text-decoration-none"><i class="fa fa-home text-black " aria-hidden="true"
                            class="" style="200px"></i>
                        <p class=" text-black">Home</p>
                    </a>
                    <a href="{{ route('home') }}" onclick="event.preventDefault();"
                        class="text-center text-decoration-none"><i class="fa fa-home text-black " aria-hidden="true"
                            class="" style="200px"></i>
                        <p class=" text-black">Home</p>
                    </a>
                    <a href="{{ route('home') }}" onclick="event.preventDefault();"
                        class="text-center text-decoration-none"><i class="fa fa-home text-black " aria-hidden="true"
                            class="" style="200px"></i>
                        <p class=" text-black">Home</p>
                    </a>

                </div>
            </div>
            {{--  --}}

            <footer class="text-center text-white" style="background-color: #45637d;">
                <!-- Grid container -->
                <div class="container p-4">
                    <!-- Section: Iframe -->
                    <section class="">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                {{-- <div class="ratio ratio-16x9">
                                    <iframe class="shadow-1-strong rounded"
                                        src="https://www.youtube.com/embed/vlDzYIIOYmM" title="YouTube video"
                                        allowfullscreen></iframe>
                                </div> --}}
                            </div>
                        </div>
                    </section>
                    <!-- Section: Iframe -->
                </div>
                <!-- Grid container -->



            </footer>

            {{--  --}}
            <!-- Footer -->
            <footer class="text-center text-lg-start bg-body-tertiary text-muted">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>Get connected with us on social networks:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <i class="fas fa-gem me-3"></i>Company name
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer content. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Products
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset">Angular</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">React</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Vue</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Laravel</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Useful links
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset">Pricing</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Settings</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Orders</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Help</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                                <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    info@example.com
                                </p>
                                <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                                <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
        <!-- Footer -->
        <!-- MDB -->



        <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        {{--
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        {{--  --}}
        <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
        {{-- markjs --}}
        <script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>
        <script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js)"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.js
                                        "></script>
        <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.dataTables.js
                                        "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js
                                        "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js
                                        "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js
                                        "></script>
        <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js
                                        "></script>
        <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js
                                        "></script>

        {{--
        https://code.jquery.com/jquery-3.7.1.js
https://cdn.datatables.net/2.2.1/js/dataTables.js
 --}}

        {{-- https://code.jquery.com/jquery-3.7.1.js
        https://cdn.datatables.net/2.2.1/js/dataTables.js
        https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js
        https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js
        https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js
        https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js --}}
        {{--  --}}

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        {{--  --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

        <!-- Laravel Javascript Validation -->
        {{-- <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script> --}}
        <script>
            $(document).ready(function() {
                $('#back').on('click', function(e) {
                    e.preventDefault();
                    window.history.back();
                });
            });
            document.querySelector('a[href="{{ route('home') }}"]').addEventListener('click', function(event) {
                event.preventDefault();
            });

            // all a
            // document.querySelectorAll('a').forEach(function(anchor) {
            //     anchor.addEventListener('click', function(event) {
            //         event.preventDefault();
            //     });
            // });
            jQuery(function($) {
                $(".sidebar-dropdown > a").click(function() {
                    $(".sidebar-submenu").slideUp(300);
                    if ($(this).parent().hasClass("active")) {
                        $(".sidebar-dropdown").removeClass("active");
                        $(this).parent().removeClass("active");
                    } else {
                        $(".sidebar-dropdown").removeClass("active");
                        $(this).next(".sidebar-submenu").slideDown(200);
                        $(this).parent().addClass("active");
                    }
                });

                $("#close-sidebar").click(function(e) {
                    e.preventDefault();
                    $(".sidebar-wrapper").fadeOut(200);
                    // Hide with fade-out effect
                    $(".page-wrapper").removeClass("toggled");
                });

                $("#show-sidebar").click(function(e) {
                    e.preventDefault();
                    $(".sidebar-wrapper").fadeIn(500);
                    // Show with fade-in effect
                    $(".page-wrapper").addClass("toggled");
                });
            });

            $.extend(true, $.fn.dataTable.defaults, {
                mark: true,
                processing: true,
                // mark: true,
                serverSide: true,
                responsive: true,
                language: {
                    paginate: {
                        next: 'Next page',
                        previous: 'Previous Page'
                    }
                },
            });


            // jQuery(function($) {

            //     $(".sidebar-dropdown > a").click(function() {
            //         $(".sidebar-submenu").slideUp(300);
            //         if (
            //             $(this)
            //             .parent()
            //             .hasClass("active")
            //         ) {
            //             $(".sidebar-dropdown").removeClass("active");
            //             $(this)
            //                 .parent()
            //                 .removeClass("active");
            //         } else {
            //             $(".sidebar-dropdown").removeClass("active");
            //             $(this)
            //                 .next(".sidebar-submenu")
            //                 .slideDown(200);
            //             $(this)
            //                 .parent()
            //                 .addClass("active");
            //         }
            //     });

            //     $("#close-sidebar").click(function() {
            //         $(".page-wrapper").removeClass("toggled");
            //     });
            //     $("#show-sidebar").click(function() {
            //         $(".page-wrapper").addClass("toggled");
            //     });
            // });
        </script>
        @yield('javascript')
</body>

</html>
