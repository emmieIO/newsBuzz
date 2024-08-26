<!DOCTYPE html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!-- Basic metas
    ======================================== -->
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Mobile specific metas
    ======================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Page Title
    ======================================== -->
    <title>::NEWSBUZZ</title>



    <!-- Icon fonts
 ======================================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,500i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/main-site/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/main-site/css/iconfont.css') }}">

    <!-- css links
 ======================================== -->
    <!-- Bootstrap link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/main-site/css/vendor/bootstrap.min.css') }}">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('dist/main-site/css/vendor/owl.carousel.min.css') }}">

    <!-- Magnific popup -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/main-site/css/vendor/magnific-popup.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/main-site/css/vendor/animate.css') }}">



    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/main-site/css/style.css') }}">


</head>

<body>
    <!-- Main contents
 ================================================ -->
    <div class="main-content">


        <!-- End of .side-nav -->

        <!-- Header starts -->
        <header class="page-header ">

            <nav class="navbar bg-grey-light-three navbar__style-three">
                <div class="container-fluid p-l-md-30 p-r-md-30">
                    <div class="navbar-inner align-items-center justify-content-between">
                        <div class="brand-logo-container h4 align-items-center">
                            <i class="fa fa-newspaper"></i>
                            <a href="{{route("home")}}" class="h4">
                                NewsBuzz
                            </a>
                        </div>
                        <!-- End of .brand-logo-container -->

                        <div class="main-nav-wrapper">
                            <ul class="main-navigation list-inline" id="main-menu">
                                <li class=" is-active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="">
                                    <a href="#">Posts</a>
                                </li>
                                @if($categories->count())
                                @foreach ($categories as $category )
                                <li><a href="{{route("post-by-category",$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                                @endif
                                <li class="">
                                    <a href="#">More Category</a>
                                </li>
                            </ul>
                            <!-- End of .main-navigation -->
                        </div>
                        <!-- End of .main-nav-wrapper -->

                        <div class="navbar-extra-features">
                            <!-- End of .navbar-search -->
                            <a href="#" class="side-nav-toggler" id="side-nav-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- End of .navbar-extra-features -->

                        <div class="main-nav-toggler d-block d-lg-none" id="main-nav-toggler">
                            <div class="toggler-inner">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <!-- End of .main-nav-toggler -->
                    </div>
                    <!-- End of .navbar-inner -->
                </div>
                <!-- End of .container -->
            </nav>
            <!-- End of .navbar -->
        </header>
        <!-- End of .page-header -->
            {{$slot}}
        <!-- End of .fluid-post-wrapper -->
    </div>
    <!-- End of .main-content -->
    <!-- Javascripts
 ======================================= -->

    <!-- jQuery -->
    <script src="/dist/main-site/js/vendor/jquery.min.js"></script>
    <script src="/dist/main-site/js/vendor/jquery-migrate.min.js"></script>
    <!-- jQuery Easing Plugin -->
    <script src="/dist/main-site/js/vendor/easing-1.3.js"></script>
    <!-- Waypoints js -->
    <script src="/dist/main-site/js/vendor/jquery.waypoints.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="/dist/main-site/js/vendor/owl.carousel.min.js"></script>
    <!-- Slick Carousel JS -->
    <script src="/dist/main-site/js/vendor/slick.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/dist/main-site/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/dist/main-site/js/vendor/isotope.pkgd.min.js"></script>
    <!-- Counter up js -->
    <script src="/dist/main-site/js/vendor/jquery.counterup.js"></script>
    <!-- Magnific Popup js -->
    <script src="/dist/main-site/js/vendor/jquery.magnific-popup.min.js"></script>
    <!-- Nicescroll js -->
    <script src="/dist/main-site/js/vendor/jquery.nicescroll.min.js"></script>
    <!-- IF ie -->
    <script src="https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2"></script>
    <!-- Plugins -->
    <script src="/dist/main-site/js/plugins.js"></script>
    <!-- Custom Script -->
    <script src="/dist/main-site/js/main.js"></script>

</body>

</html>
